<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        return [
            "title" => $this->faker->name(),
            "content" => $this->faker->text(),
            "image" => $this->faker->imageUrl(),
            "likes" => $this->faker->numberBetween(0, 10),
            "is_published" => true,
            "category_id" => Category::inRandomOrder()->first("id")->id,
        ];
    }
}
