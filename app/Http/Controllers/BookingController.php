<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;



class BookingController extends Controller
{
    public function booking_get(){

        $bookings = Booking::with(['user','car','transaction','driver'])->get();
        return $bookings->toJson(JSON_PRETTY_PRINT);
        }
}
