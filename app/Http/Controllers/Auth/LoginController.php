<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function __construct() {
		$this->middleware('guest', ['except' => 'logout']);
	}

	/**
	 * Форма входа в личный кабинет
	 */
	public function login() {
		return view('auth.login');
	}

	/**
	 * Аутентификация пользователя
	 */
	public function authenticate(LoginRequest $request) {

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return redirect()
				->route('user.index')
				->with('success', 'Вы вошли в личный кабинет');
		}

		return redirect()
			->route('auth.login')
			->withErrors('Неверный логин или пароль');
	}

	/**
	 * Выход из личного кабинета
	 */
	public function logout() {
		Auth::logout();
		return redirect()
			->route('auth.login')
			->with('success', 'Вы вышли из личного кабинета');
	}
}
