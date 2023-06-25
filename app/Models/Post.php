<?php

namespace App\Models;

use App\Facade\ResizeImage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
	use HasFactory;

	protected $perPage = 10;

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class)->withTimestamps();
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	/**
	 * @param string $search
	 * @return mixed
	 */
	public function getByQuery(string $search): mixed
	{
		return Post::whereHas('user', function (Builder $query) use ($search)
		{
			$query->where('name', 'LIKE', "%{$search}%");
		})->orWhere('title', 'LIKE', "%{$search}%")->orWhere('body', 'LIKE', "%{$search}%")->paginate(4);
	}

	public function createNewPost(Request $request)
	{
		$post = new Post();
		$post->user_id = Auth::id();
		$post->title = $request->title;
		$post->body = $request->body;
		$image = $request->file('image');
		if ($image)
		{
			Storage::putFileAs('public/images', $image, $image->hashName());
			$post->image = $image->hashName();
		}
		$post->thumb = ResizeImage::crop($image);
		$post->save();
	}
}
