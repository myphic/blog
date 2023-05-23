@extends('layouts.index')

@section('content')
	<h1 class="mt-2 mb-3">Создать пост</h1>
	<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
		@csrf
		@include('particles.form')
	</form>
@endsection