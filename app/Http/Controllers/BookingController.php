<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function booking_get(){
        $bookings = Booking::with(['user','car','transaction','driver'])->get();
        return response()->json([
            'data' => $bookings,
            'code' => 200
        ], 200);
    }
        
    public function booking_create(Request $request){
        // to do add validation later
        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->car_id = $request->car_id;
        $booking->driver_id = $request->driver_id;
        $booking->transaction_id = $request->transaction_id;
        $booking->save();

        return response()->json([
            'data' => $booking,
            'code' => 200
        ], 200);
    }

        
    public function booking_update(Request $request){
        $booking = Booking::find($request->id);  //validation: upon updating if id not found cannot update
        if (!$booking) {
            return response()->json([
                'message'=> 'Booking not found',
                'code' => 404       //htttp status codes
            ], 404);
        }
    
        $booking->user_id = $request->user_id ?? $booking->user_id;
        $booking->car_id = $request->car_id ?? $booking->car_id;
        $booking->driver_id = $request->driver_id ?? $booking->driver_id;
        $booking->transaction_id = $request->transaction_id ?? $booking->transaction_id;
        $booking->save();

        return response()->json([
            'data' => $booking,
            'code' => 200
        ], 200);
    }
}
