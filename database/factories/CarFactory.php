<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price'=> fake()->numberBetween(1800,3000),
            'make' => fake()->randomElement(['Nissan', 'Toyota','Mazda']),
            'model'=> fake()->randomElement(['ventury','celerio','Jazz']),
            'transmission'=> fake()->randomElement(['Automatic','Manual']),
            'gas_type'=> fake()->randomElement(['gasoline','deisel']),
            'year_model'=> fake()->randomElement(['2018','2019','2020']),
            'number_of_seats'=> fake()->numberBetween(4, 16),
            'type'=> fake()->randomElement(['van','sedan','suv']),
        ];
    }
}
