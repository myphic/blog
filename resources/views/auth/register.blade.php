@extends('layouts.index', ['title' => 'Регистрация'])

@section('content')
	<h1>Регистрация</h1>

	<form method="post" action="{{ route('auth.register') }}">
		@csrf
		<div class="form-group mb-3">
			<input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
				   required maxlength="255" value="{{ old('name') ?? '' }}">
		</div>
		<div class="form-group mb-3">
			<input type="email" class="form-control" name="email" placeholder="Адрес почты"
				   required maxlength="255" value="{{ old('email') ?? '' }}">
		</div>
		<div class="form-group mb-3">
			<input type="password" class="form-control" name="password" placeholder="Придумайте пароль"
				   required maxlength="255" value="">
		</div>
		<div class="form-group mb-3">
			<input type="password" class="form-control" name="password_confirmation"
				   placeholder="Пароль еще раз" required maxlength="255" value="">
		</div>
		<div class="form-group mb-3">
			<button type="submit" class="btn btn-info text-white">Регистрация</button>
		</div>
	</form>
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
@endsection