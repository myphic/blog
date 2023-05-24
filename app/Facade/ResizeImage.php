<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\ImageService
 */
class ResizeImage extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'resizeimage';
	}
}