<div class="container">
	<header class="blog-header lh-1 py-3">
		<div class="row flex-nowrap justify-content-between align-items-center">
			<div class="col-4 pt-1">
				<a class="link-secondary" href="{{route('posts.index')}}">Главная</a>
			</div>
			<div class="col-4 text-center">
				<a class="blog-header-logo text-body-emphasis" href="#">Большой</a>
			</div>
			<form action="{{route('search')}}" name="searchForm"  method="GET" class="col-4 d-flex justify-content-end align-items-center">

				<input id="title-search-input" type="text" name="search" value="" class="search-form @error('s') is-invalid @enderror" required placeholder="Поиск" />
				<input type="submit" class="search-btn" />
				<a class="btn btn-sm btn-outline-secondary" href="#">Регистрация</a>
			</form>
		</div>
	</header>

	<div class="nav-scroller py-1 mb-2">
		<nav class="nav d-flex justify-content-between">
			<a class="p-2 link-secondary" href="{{route('posts.create')}}">Создать пост</a>
		</nav>
	</div>
</div>

