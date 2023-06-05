@extends('layouts.index', ['title' => 'Вход в личный кабинет'])

@section('content')
	<h1>Вход в личный кабинет</h1>
	<form method="post" action="{{ route('auth.auth') }}">
		@csrf
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" placeholder="Адрес почты"
				   required maxlength="255" value="{{ old('email') ?? '' }}" aria-describedby="emailHelp" id="email">
		</div>
		<div class="form-group">
			<label for="pass">Пароль:</label>
			<input type="password" class="form-control" id="pass" placeholder="Пароль" required>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="check">
			<label class="form-check-label" for="check">Запомнить меня</label>
		</div>
		<button type="submit" class="btn btn-primary">Войти</button>
		<a class="btn btn-secondary" href="{{route('auth.forgot-form')}}">Забыли пароль?</a>
	</form>
@endsection