<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'first_name' => 'Kim',
             'last_name'=> 'Diaz',
             'email' => 'test@example.com',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
             'is_admin'=> true,
             'address'=> 'address',
         ]);
        \App\Models\Driver::factory(10)->create();
        \App\Models\Car::factory(10)->create();
        \App\Models\Transaction::factory(10)->create();
        \App\Models\Booking::factory(10)->create();
    }
}
