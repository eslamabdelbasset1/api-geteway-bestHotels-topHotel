<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TopHotel>
 */
class TopHotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotelName' => fake()->unique()->word,
            'rate' => str_repeat('*', fake()->numberBetween(1, 5)),
            'price' => fake()->randomFloat(2, 50, 500),
            'discount' => fake()->optional()->randomFloat(2, 5, 20),
            'roomAmenities' => fake()->words(5, true),
        ];
    }
}
