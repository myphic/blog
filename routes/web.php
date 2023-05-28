<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group([
	'as' => 'auth.',
	'prefix' => 'auth',
], function () {
	Route::get('register', [RegisterController::class, 'register'])
		->name('register');

	Route::post('register', [RegisterController::class, 'create'])
		->name('create');

	Route::get('login', [LoginController::class, 'login'])
		->name('login');

	Route::post('login', [LoginController::class, 'authenticate'])
		->name('auth');

	Route::get('logout', [LoginController::class, 'logout'])
		->name('logout');
});

Route::group([
	'as' => 'user.',
	'prefix' => 'user',
	'namespace' => '\App\Http\Controllers\User',
	'middleware' => ['auth'],
], function () {
	Route::get('index', 'IndexController')->name('index');
});
Route::resources(['posts' => PostController::class]);
Route::get('/search', [PostController::class, 'search'])->name('search');

