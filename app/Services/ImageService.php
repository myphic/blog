<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageService
{
	public function crop($file, int $width = 400, int $height = 300): string
	{
		$fileName = '';
		if ($file) {
			$fileName = $file->hashName();
			$thumbnail = Image::make($file);
			$thumbnail->fit($width, $height);
			$thumbnail->save(storage_path('app/public/thumb/'. $fileName));
		}
		return $fileName;
	}
}