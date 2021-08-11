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
<tr>
<td>
@if($item->is_liked_by_auth_user())
<a href="{{ route('unlike_post', $item->id) }}" class="fas fa-heart">
  @csrf
  <span class="badge">{{$item->likes->count()}}</span>
</a>
@else
<a href="{{ route('like_post', $item->id) }}" class="far fa-heart">
    @csrf
 <span class="badge">{{$item->likes->count()}}</span>
</a>
@endif
</td>
</tr>
@endforeach
</table>
@endsection
