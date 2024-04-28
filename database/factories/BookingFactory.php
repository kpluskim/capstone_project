<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
            $userCount = User::all()->count();
            $carCount =Car::all()->count();
            $driverCount =Driver::all()->count();
            $transactionCount = Transaction::all()->count();
            
            return [
                "user_id"=> fake()->numberBetween(1, $userCount),
                "car_id"=> fake()->numberBetween(1, $carCount),
                "driver_id"=> fake()->numberBetween(1, $driverCount),
                "transaction_id"=> fake()->numberBetween(1, $transactionCount),
            ];
        
    }
}
