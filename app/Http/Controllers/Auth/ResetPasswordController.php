<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Форма ввода нового пароля
	 */
	public function form($token, $email)
	{
		return view('auth.reset-password', compact('token', 'email'));
	}

	/**
	 * Установка нового пароля
	 */
	public function reset(Request $request)
	{
		$request->validate([
			'email' => 'required|email|exists:users',
			'password' => 'required|string|min:8|confirmed',
		]);

		$expire = Carbon::now()->subMinute(60);
		DB::table('password_resets')
			->where('created_at', '<', $expire)
			->delete();

		$row = DB::table('password_resets')
			->where([
				'email' => $request->email,
				'token' => $request->token,
			])
			->first();

		if (!$row)
		{
			return back()->withErrors('Ссылка восстановления пароля устарела');
		}

		User::where('email', $request->email)
			->update(['password' => Hash::make($request->password)]);

		DB::table('password_resets')->where(['email' => $request->email])->delete();

		return redirect()
			->route('auth.login')
			->with('success', 'Ваш пароль был успешно изменен');
	}
}
