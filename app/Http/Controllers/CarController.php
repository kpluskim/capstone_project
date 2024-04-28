<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function car_get(){
        
        $cars = Car::all();
        return $cars->toJson(JSON_PRETTY_PRINT);
        }
}
