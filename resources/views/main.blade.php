@extends('layouts.index')
@section('content')
	<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
		<div class="col-md-6 px-0">
			<h1 class="display-4 fst-italic">Заголовок более подробного сообщения в блоге</h1>
			<p class="lead my-3">Множественные строки текста, которые образуют ленту, быстро и эффективно
				информируют новых читателей о том, что наиболее интересно в содержании этого сообщения.</p>
			<p class="lead mb-0"><a href="#" class="text-white fw-bold">Продолжить чтение...</a></p>
		</div>
	</div>

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
						<div>
							Теги:
							@foreach($post->tags as $tag)
								<span class="badge text-bg-info">{{$tag->name}}</span>
							@endforeach
						</div>
						@if($post->category)
							<div>
								Категория: <span class="badge text-bg-dark">{{$post->category->name}}</span>
							</div>
						@endif
						<div>Комментариев: <span class="text-primary">{{$post->comments->count()}}</span></div>
					</div>
					<div class="col-auto d-none d-lg-block">
						@if (File::exists('storage/thumb/' . $post->image) && $post->image)
							<img src="{{asset('storage/thumb/' . $post->image)}}"/>
						@endif
					</div>
				</div>
			</div>
		@endforeach
		{{$posts->links()}}
	</div>
@endsection
