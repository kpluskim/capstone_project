<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//User
Route::get('/api/users/user_get', [UserController::class,'user_get']);
//Car
Route::get('/api/cars/car_get', [CarController::class,'car_get'] );
//Driver
Route::get('/api/drivers/driver_get', [DriverController::class,'driver_get'] );
//Booking
Route::get('/api/bookings/booking_get', [BookingController::class,'booking_get'] );
//Transaction
Route::get('/api/transactions/transaction_get',[TransactionController::class,'transaction_get'] );