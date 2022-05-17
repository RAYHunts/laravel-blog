<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(2),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->paragraph(mt_rand(5, 20)),
            'excerpt' => $this->faker->paragraph(),
            'category_id' => rand(1, 12),
            'user_id' => rand(1, 12),
            'published_at' => $this->faker->dateTimeBetween('-3 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'views' => rand(1, 100),
            'image' => $this->faker->imageUrl(),
            'caption' => $this->faker->sentence(),
        ];
    }
}