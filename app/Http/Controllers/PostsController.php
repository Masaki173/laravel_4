<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{       public function index(Request $request)
       {   
           $items = Post::with('user')->get();
           return view('posts.index', compact('items'));
       }
        public function create(Request $request)
        {
            return view('posts.post');
        }
        public function store(PostRequest $request)
        {
            $post = new Post;
            $form = $request->all();
            unset($form['_token']);
            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            return redirect('/posts');
        }
        public function edit($id){
            $post = Post::find($id);
            return view('posts.edit', compact('post'));
        }
        public function update(PostRequest $request, $id){
            $post = Post::find($id);
            $form = $request->all();
            unset($form['_token']);
            $post->fill($form)->save();
            return redirect('/posts');
        }
        public function destroy($id){
            $item = Post::find($id);
            $item->delete();
            return redirect('/posts');
        }
    }
