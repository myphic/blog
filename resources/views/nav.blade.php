<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand link-danger" href="#">Главная</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="{{route('posts.index')}}">Посты</a>
				</li>
			</ul>
			<form action="{{route('search')}}" name="searchForm" class="form-inline my-2 my-lg-0" method="GET">
				<input id="title-search-input" type="text" name="search" value="" class="form-control d-inline w-auto mr-sm-2 @error('s') is-invalid @enderror" required placeholder="Поиск" />
				<input type="submit" class="btn btn-outline-success my-2" value="Найти" />
			</form>
		</div>
	</div>
</nav>

