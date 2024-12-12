<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph,
            'published_at' => $this->faker->date(),
            'status' => $this->faker->randomElement(['PUBLISH', 'DRAFT']),
            'category_id' => $this->faker->numberBetween(1, 3000),
            'author_id' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
