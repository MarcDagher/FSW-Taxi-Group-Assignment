<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RidesController extends Controller
{
    public function createRideRequest(Request $request){ // pickup_location, destination_location, ride_price
        // get user id from token
        // get pickup_location, destination_location from request
        // status is pending by default
        $token = Auth::user();

        $request -> validate([
            'pickup_location' => 'required|string',
            'destination_location' => 'required|string',
            // 'ride_price' => 'required',
        ]);

        $exists = Ride::where(['pickup_location'=> $request->pickup_location, 'destination_location' => $request -> destination_location, 'user_id' => $token -> user_id]) -> first();

        if (!$exists){
            Ride::create([
                'pickup_location' => $request->pickup_location,
                'destination_location' => $request -> destination_location,
                'status' => $request -> status ?? 'pending',
                'ride_price' => $request -> ride_price,
                'user_id' => $token -> user_id,
                // 'driver_id' => ???  when driver accepts 
                // 'accepted_at' => when driver accepts
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Request created successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Request already exists'
            ]);
        }
    }

    public function deleteRideRequest(Request $request){
        $request -> validate([
            'ride_id' => 'required|integer'
        ]);
        $token = Auth::user();

        $exists = Ride::where(['pickup_location'=> $request->pickup_location, 'destination_location' => $request -> destination_location, 'user_id' => $token -> user_id]) -> first(); // validate if there is a request by this user

        $ride = Ride::where(['pickup_location'=> $request->pickup_location, 'destination_location' => $request -> destination_location, 'user_id' => $token -> user_id]) -> get();

        if ($exists){
            if ($token->user_id == $ride[0]->user_id){
                Ride::where('ride_id', $ride[0]->ride_id)->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => "Ride deleted successfully",
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Unauthorized",
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => "Ride doesn't exist",
            ]);
        }


        

    }
}