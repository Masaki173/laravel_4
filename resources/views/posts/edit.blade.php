@extends('layouts.posts')
@section('title', 'edit')
@section('post_title')
<form action="update" method ="post">
  @csrf
  <input type="text"  name="title" value="{{$post->title)}}"></input>
  @endsection
  @section('post_content')
  <textarea name="content" value="{{$post->content}}"></textarea>
  <button type=submit>追加</button>
 </form>
 @endsection