@extends('layouts.posts')
@section('title', 'index')
<table>
  @section('post_content')
  @foreach ($items as $item)
<tr><th>{{$item->title}}</th></tr>
<tr><td>{{$item->content}}</td></td>
<tr>
<td>
{{$item->user->name}}
@if ($item->user_id === Auth::user()->id)
<form action="posts/{{$item->id}}/edit" method="get">
 @csrf
  <input type="hidden" name="id">
  <button>編集する</button>
</form>
<form action="posts/del/{{$item->id}}" method="post">
 @method('delete')
 @csrf
  <input type="hidden" name="id">
  <button>削除する</button>
</form>
@endif
</td>
</tr>
@endforeach
</table>
@endsection
