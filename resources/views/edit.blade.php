@extends('layouts.index')

@section('content')
	<h1 class="mt-2 mb-3">Редактирование поста</h1>
	<form method="post" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
		@method('PATCH')
		@include('particles.form')
	</form>
@endsection