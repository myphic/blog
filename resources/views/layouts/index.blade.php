<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcat icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
	<title>{{$title ?? 'Blog'}}</title>
	@vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
<main class="container">
	@include('nav')
	@if ($message = Session::get('success'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
			{{ $message }}
		</div>
	@endif
	@yield('content')
</main>
</body>
</html>
