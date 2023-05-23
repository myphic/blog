@extends('layouts.index')

@section('content')
	<h1 class="mt-2 mb-3">Редактирование поста</h1>
	<form method="post" action="{{ route('posts.update', ['post' => $post->post_id]) }}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group mb-3">
			<input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{$post->title}}" required>
		</div>
		<div class="form-group mb-3">
			<textarea class="form-control" name="body" placeholder="Текст поста" rows="7" required>{{$post->body}}</textarea>
		</div>
		<div class="form-group mb-3">
			<input type="file" class="form-control-file" name="image">
		</div>
		<div class="form-group mb-3">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
@endsection