<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BestHotel;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BestHotel>
 */
class BestHotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        define(BestHotel::class, function (Faker $faker) {
            return [
                'hotelName' => fake()->unique()->word,
                'rate' => fake()->numberBetween(1, 5),
                'hotelFare' => fake()->randomFloat(2, 50, 500),
                'roomAmenities' => fake()->words(5, true),
            ];
//        });
    }
}
