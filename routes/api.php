<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/authenticate', [UserController::class,'authenticate']);

// User
Route::get('/users/user_get', [UserController::class,'user_get']);

// Car
Route::get('/cars/car_get', [CarController::class,'car_get'] );
Route::post('/cars/car_create', [CarController::class,'car_create'] );
Route::post('/cars/car_update/{id}', [CarController::class,'car_update'] );

// Driver
Route::get('/drivers/driver_get', [DriverController::class,'driver_get'] );
Route::post('/drivers/driver_create', [DriverController::class,'driver_create'] );
Route::post('/drivers/driver_update/{id}', [DriverController::class,'driver_update'] );

// Booking
Route::get('/bookings/booking_get', [BookingController::class,'booking_get'] );
Route::post('/bookings/booking_create', [BookingController::class,'booking_create'] );
Route::post('/bookings/booking_update/{id}', [BookingController::class,'booking_update'] );

// Transaction
Route::get('/transactions/transaction_get',[TransactionController::class,'transaction_get'] );
Route::post('/transactions/transaction_create', [TransactionController::class,'transaction_create'] );
Route::post('/transactions/transaction_update/{id}', [TransactionController::class,'transaction_update'] );
