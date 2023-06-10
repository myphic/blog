<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
