@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Добавить категорию</h3>
			</div>
			<form enctype="multipart/form-data" method="post" action="{{route('category.store')}}">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="name">Название категории</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Введите название категории">
					</div>
					<div class="form-group">
						<label for="slug">ЧПУ</label>
						<input type="text" class="form-control" id="slug" name="slug" placeholder="ЧПУ">
					</div>
					<div class="form-group">
						<label for="content">Описание</label>
						<input type="text" class="form-control" id="name" name="content" placeholder="Введите описание категории">
					</div>
					<div class="form-group">
						<label for="image">Картинка</label>
						<input type="file" class="form-control" id="name" name="image" placeholder="Загрузите изображение">
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</form>
		</div>
	</div>
@endsection