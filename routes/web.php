<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'main']);

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

	Route::get('forgot-password', [ForgotPasswordController::class, 'form'])
		->name('forgot-form');

	Route::post('forgot-password', [ForgotPasswordController::class, 'mail'])
		->name('forgot-mail');

	Route::get('reset-password/token/{token}/email/{email}', [ResetPasswordController::class, 'form']
	)->name('reset-form');

	Route::post('reset-password', [ResetPasswordController::class, 'reset'])
		->name('reset-password');
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
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
	Route::get('/', [HomeController::class, 'index'])->name('admin-index');

	Route::resource('admin-category', CategoryController::class);

	Route::resource('admin-posts', AdminPostController::class);
});

