@extends('layouts.admin', ['title' => '[ADMIN] - Главная'])

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-3 col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<h3>{{$postCount}}</h3>
							<p>Количество постов на сайте</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">Больше информации: <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>{{$userCount}}</h3>
							<p>Кол-во зарегистрированных пользователей</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="#" class="small-box-footer">Больше информации: <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>

			</div>
		</div>
	</section>
@endsection