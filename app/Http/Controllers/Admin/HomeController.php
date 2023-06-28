<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		return view('admin.index', ['postCount' => Post::count(), 'userCount' => User::count()]);
	}
}
