@extends('layouts.posts')
@section('title', 'edit')
@section('post_content')
@error('title')
<p>{{$message}}</p>
@enderror
@error('content')
<p>{{$message}}</p>
@enderror
<form action="update" method ="post">
  @method('put')
  @csrf
  <input type="text"  name="title" value="{{$post->title}}"></input>
  <textarea name="content">{{$post->content}}</textarea>
  <button type=submit>追加</button>
 </form>
 @endsection