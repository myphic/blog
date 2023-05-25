<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$name = $this->faker->realText(rand(40, 50));
		return [
			'name' => $name,
			'content' => $this->faker->realText(rand(200, 500)),
			'slug' => Str::slug($name),
		];
	}
}
