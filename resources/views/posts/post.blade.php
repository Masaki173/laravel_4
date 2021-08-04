@extends('layouts.posts')
@section('title', 'post')

@section('post_content')
@error('title')
<p>{{$message}}</p>
@enderror
@error('content')
<p>{{$message}}</p>
@enderror
<form action="store" method ="post">
  @csrf
  <input type="text"  name="title"></input>
  <textarea name="content"></textarea>
  <button type=submit>追加</button>
 </form>
 @endsection