@extends('layouts.app')
@section('content')
<html>
<head>
<title>@yield('title')</title>
</head>
<body>
<div class = "content">
<p>@yield('post_content')</p>
</div>
</body>
</html>
@endsection