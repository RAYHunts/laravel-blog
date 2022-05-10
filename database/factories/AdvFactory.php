<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adv>
 */
class AdvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'link' => $this->faker->url(),
            'image' => $this->faker->imageUrl(),
            'caption' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'content' => $this->faker->paragraph(mt_rand(5, 20)),
        ];
    }
}