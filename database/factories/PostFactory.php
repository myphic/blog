<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
			'post_id' => 1,
            'title' => $this->faker->realText(rand(25, 30)),
            'image' => $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'body' => $this->faker->realText(rand(200, 300)),
            'created_at' => $this->faker->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => $this->faker->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
