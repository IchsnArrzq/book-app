<?php

namespace Database\Factories;

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
            'code' => str()->random(10),
            'title' => fake()->safeColorName() . ' ' . fake()->word(),
            'publication_year' => fake()->year(),
            'writer' => fake()->name(),
            'stock' => rand(1, 10),
        ];
    }
}
