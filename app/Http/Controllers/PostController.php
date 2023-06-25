<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function index()
	{
		$posts = Post::paginate();
		return view('main', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		$post = new Post();
		$post->createNewPost($request);
		return redirect()->route('posts.index')->with('success', 'Пост успешно создан.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$post = Post::join('users', 'users.id', '=', 'posts.user_id')
			->findOrFail($id);
		return view('show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return view('edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id)
	{
		$post = Post::find($id);
		$post->title = $request->title;
		$post->body = $request->body;
		$image = $request->file('image');
		if ($image)
		{
			$originalFileName = $request->file('image')->getClientOriginalName();
			Storage::putFileAs(public_path('images'), $image, $originalFileName);
			$post->image = $originalFileName;
		}
		$post->save();
		return redirect()
			->route('posts.show', ['id' => $post->post_id])
			->with('success', 'Пост успешно отредактирован');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		return redirect()
			->route('posts.index', ['id' => $post->post_id])
			->with('success', 'Пост успешно удален');
	}

	public function search(SearchRequest $request)
	{
		return view('search', ['posts' => (new Post())->getByQuery($request->search)]);
	}


	public function main()
	{
		return view('index');
	}
}
