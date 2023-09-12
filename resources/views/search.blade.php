@extends('layouts.index')

@section('content')
	<div>Результаты поиска:</div>
	@if(count($posts) > 0)
		<div class="row mb-2">
			@foreach($posts as $post)
				<div class="col-md-6">
					<div
						class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
						<div class="col p-4 d-flex flex-column position-static">
							<strong class="d-inline-block mb-2 text-primary">Автор: {{$post->user->name}}</strong>
							<h3 class="mb-0">{{$post->title}}</h3>
							<div class="mb-1 text-body-secondary">{{$post->created_at}}</div>
							<p class="card-text mb-auto">{{Str::limit($post->body, 50, '[...]')}}</p>
							<a href="{{route('posts.show', ['post' => $post->id])}}" class="stretched-link">Продолжить чтение</a>
						</div>
						<div class="col-auto d-none d-lg-block">
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
				</div>
			@endforeach
		</div>
	@else
	<div> По вашему запросу ничего не найдено. </div>
	@endif

@endsection
