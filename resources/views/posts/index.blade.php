@extends('layouts.posts')
@section('title', 'index')
@section('post_content')
<table>
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
<tr>
<td>
@if($item->is_liked_by_auth_user())
<form action="{{ route('unlike_post', $item->id) }}" method="post">
  @csrf
  <input type="submit" value="&#xf004;" class="fas fa-heart">
  <span class="badge">{{$item->likes->count()}}</span>
</form>
@else
<form action="{{ route('like_post', $item->id) }}" method="post">
  @csrf
  <input type="submit" value="&#xf004;" class="far fa-heart">
  <span class="badge">{{$item->likes->count()}}</span>
</form>
@endif
</td>
</tr>
@endforeach
</table>
@endsection
