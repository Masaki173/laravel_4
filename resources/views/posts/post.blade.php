@extends('layouts.posts')
@section('title', 'post')

@section('post_content')
<form action="store" method ="post">
  @csrf
  <input type="text"  name="title"></input>
  <textarea name="content"></textarea>
  <button type=submit>追加</button>
 </form>
 @endsection