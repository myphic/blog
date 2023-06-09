<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand link-danger" href="#">Главная</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link {{ Route::is('posts*') ? 'link-danger' : null }}" href="{{route('posts.index')}}">Посты</a>
				</li>
				@guest
					<li class="nav-item">
						<a class="nav-link {{ Route::is('auth.login') ? 'link-danger' : null }}" href="{{ route('auth.login') }}">Войти</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Route::is('auth.register') ? 'link-danger' : null }}" href="{{ route('auth.register') }}">Регистрация</a>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link {{ Route::is('user*') ? 'link-danger' : null }}" href="{{ route('user.index') }}">Личный кабинет - {{Auth::user()->name}}</a>
					</li>
					@if(Auth::user()->hasRole('admin'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin-index') }}">Админ-панель</a>
						</li>
					@endif
					<li class="nav-item">
						<a class="nav-link" href="{{ route('posts.create') }}">Написать пост</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('auth.logout') }}">Выйти</a>
					</li>
				@endif
			</ul>
			<form action="{{route('search')}}" name="searchForm" class="form-inline my-2 my-lg-0" method="GET">
				<input id="title-search-input" type="text" name="search" value="" class="form-control d-inline w-auto mr-sm-2 @error('s') is-invalid @enderror" required placeholder="Поиск" />
				<input type="submit" class="btn btn-outline-success my-2" value="Найти" />
			</form>
		</div>
	</div>
</nav>

