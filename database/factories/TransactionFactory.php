<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userCount = User::all()->count();
        return [
            "payment_method"=> fake()->randomElement(['digital_wallet','cash','credit']),
            "status"=> fake()->randomElement(['confirmed','pending','unsuccesful']),
            "fee"=> fake()->numberBetween(1000,100000),
            "user_id"=> fake()->numberBetween(1, $userCount),
        ];
    }
}
