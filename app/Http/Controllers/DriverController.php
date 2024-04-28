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
}
