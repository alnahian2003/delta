<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->realText(60),
            'body' => fake()->paragraph(30),
            'user_id' => User::first(),
            'category_id' => Category::factory()->create(),
            'tags' => 'blog, article, laravel'
        ];
    }
}
