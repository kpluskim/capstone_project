<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function driver_get(){
        $drivers = Driver::all();
        return $drivers->toJson(JSON_PRETTY_PRINT);
    }
        
    public function driver_create(Request $request){
        // to do add validation later
        $driver = new Driver();
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->age = $request->age;
        $driver->gender = $request->gender;
        $driver->save();

        return response()->json(['message' => ['Driver has been successfully created.'], 201]);
    }

    public function driver_update(Request $request){
        $driver = Driver::find($request->id);  //validation: upon updating if id not found cannot update
        if (!$driver) {
            return response()->json([
                'message'=> 'Driver not found',
                'code' => 404   //htttp status codes
            ]);
        }

        $driver->first_name = $request->first_name ?? $driver->first_name;
        $driver->last_name = $request->last_name ?? $driver->last_name;
        $driver->age = $request->age ?? $driver->age;
        $driver->gender = $request->gender ?? $driver->gender;
        $driver->save();

        return response()->json(['Successfully Updated' => $request->id]);
    }
}