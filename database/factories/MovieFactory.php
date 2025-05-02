<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->word(),
            'description'=>fake()->sentence(10),
            'release_date'=>fake()->dateTime(),
            'nationality'=>fake()->country(),
            'price'=> fake()->randomFloat(2, 1, 100),
            'genre_id'=>Genre::inRandomOrder()->first()->id,
        ];
    }
}
