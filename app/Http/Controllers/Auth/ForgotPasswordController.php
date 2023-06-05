<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Форма ввода адреса почты
	 */
	public function form() {
		return view('auth.forgotpass');
	}

	/**
	 * Письмо на почту для восстановления
	 */
	public function mail(ForgotPasswordRequest $request) {
		$token = Str::random(60);
		DB::table('password_resets')->insert(
			['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
		);

		$link = route('auth.reset-form', ['token' => $token, 'email' => $request->email]);
		Mail::send(
			'email.reset-password',
			['link' => $link],
			function($message) use ($request) {
				$message->to($request->email);
				$message->subject('Восстановление пароля');
			}
		);
		return back()->with('success', 'Ссылка для восстановления пароля отправлена на почту');
	}
}
