<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'post_id' => rand(1, 50),
			'user_id' => rand(1, 10),
			'content' => $this->faker->realText(rand(200, 500)),
			'created_at' => $this->faker->dateTimeBetween('-200 days', '-50 days'),
			'updated_at' => $this->faker->dateTimeBetween('-40 days', '-1 days'),
			'published_by' => rand(1, 3),
		];
	}
}
