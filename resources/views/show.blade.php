@extends('layouts.index')

@section('content')
	<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
		<div class="col p-4 d-flex flex-column position-static">
			<strong class="d-inline-block mb-2 text-primary">Автор: {{$post->user->name}}</strong>
			<h3 class="mb-0">{{$post->title}}</h3>
			<div class="mb-1 text-body-secondary">{{$post->created_at}}</div>
			<p class="card-text mb-auto">{{$post->body}}</p>
			<div>
				<a class="btn btn-info" href="{{route('posts.edit', ['post' => $post->post_id])}}">Редактировать</a>
				<form action="{{ route('posts.destroy', ['post' => $post->post_id]) }}"
					  method="post" onsubmit="return confirm('Удалить этот пост?')"
					  class="d-inline">
					@csrf
					@method('DELETE')
					<input type="submit" class="btn btn-danger" value="Удалить">
				</form>
			</div>
		</div>
		<div class="col-auto d-none d-lg-block">
			@dump($post->image)
			@if (File::exists('images/' . $post->image) && $post->image)
				<img src="{{asset('images/' . $post->image)}}"/>
			@else
				<svg class="bd-placeholder-img" width="200" height="250"
					 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
					 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
					<rect width="100%" height="100%" fill="#55595c"></rect>
					<text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
				</svg>
			@endif
		</div>
	</div>
@endsection