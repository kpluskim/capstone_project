<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function car_get() {
        $cars = Car::all();
        return $cars->toJson(JSON_PRETTY_PRINT);
    }

    public function car_create(Request $request) {
        $car = new Car();
        $car->price = $request->price;   
        $car->make = $request->make;
        $car->model = $request->model;
        $car->transmission = $request->transmission;
        $car->gas_type = $request->gas_type;
        $car->year_model = $request->year_model;
        $car->number_of_seats = $request->number_of_seats;
        $car->type = $request->type;
        $car->save();

        return response()->json(['message' => ['Car has been successfully created.'], 201]);
    }

    public function car_update(Request $request){
        $car = Car::find($request->id);   //Validation: upon updating if id not found cannot update
        if (!$car) {
            return response()->json([
                'message'=> 'car not found',
                'code' => 404            //htttp status codes
            ]);
        }
    
        $car->price = $request->price ?? $car->price;           // replace this to valididation
        $car->make = $request->make ?? $car->make;
        $car->model = $request->model ?? $car->model;
        $car->transmission = $request->transmission ?? $car->transmission;
        $car->gas_type = $request->gas_type ?? $car->gas_type;
        $car->year_model = $request->year_model ?? $car->year_model;
        $car->number_of_seats = $request->number_of_seats ?? $car->number_of_seats;
        $car->type = $request ->type ?? $car->type;
        $car->save();

        return response()->json(['success' => $request->id]);
    }
}
