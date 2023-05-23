<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog</title>
	@vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>
@include('nav')
<main class="container">
	@if ($message = Session::get('success'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ $message }}
		</div>
	@endif
	@yield('content')
</main>
</body>
</html>
