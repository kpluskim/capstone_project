<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'first_name' => fake()->name(),
        'last_name'=> fake()->name(),
        'gender'=> fake()->randomElement(['male', 'female']),
        'age'=> fake()->randomDigit(),
        ];
    }
}
