<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function __construct() {
		$this->middleware('guest');
	}

	public function register() {
		return view('auth.register');
	}

	public function create(RegisterRequest $request) {

		$user = new User();
		$user->register($request);

		return redirect()
			->route('auth.login')
			->with('success', 'Вы успешно зарегистрировались');
	}
}
