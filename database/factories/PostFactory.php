<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_name' => $this->faker->name(),
            'author_email' => $this->faker->unique()->safeEmail(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(),
            'img' => Str::random(5) . 'jpg',
            'img_thumb' => Str::random(5) . 'jpg',
            'is_publish' => false,
        ];
    }
}
