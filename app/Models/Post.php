<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use HasFactory;

	protected $primaryKey = 'post_id';
	protected $perPage = 10;

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function tags() {
		return $this->belongsToMany(Tag::class)->withTimestamps();
	}
}
