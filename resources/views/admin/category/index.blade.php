@extends('layouts.admin')

@section('content')
	<? Illuminate\Support\Facades\Redis::connection()->ping(); ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Категории</h3>
					<div class="card-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

							<div class="input-group-append">
								<button type="submit" class="btn btn-default">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
						<thead>
						<tr>
							<th>Название</th>
							<th>ЧПУ</th>
							<th>Контент</th>
						</tr>
						</thead>
						<tbody>
						@foreach($categories as $category)
							<tr>
								<td>{{$category->name}}</td>
								<td>{{$category->slug}}</td>
								<td>{{$category->content}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection