<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RidesController extends Controller
{
    public function createRideRequest(Request $request){

        $token = Auth::user();

        $request -> validate([
            'pickup_location' => 'required|string',
            'destination_location' => 'required|string',
            'ride_price' => 'required|numeric',
        ]);

        $exists = Ride::where(['pickup_location'=> $request->pickup_location, 'destination_location' => $request -> destination_location, 'user_id' => $token -> user_id]) -> first();

        if (!$exists){
            Ride::create([
                'pickup_location' => $request->pickup_location,
                'destination_location' => $request -> destination_location,
                'status' => $request -> status ?? 'pending',
                'ride_price' => $request -> ride_price,
                'user_id' => $token -> user_id,
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

    public function cancelRideRequest(Request $request){ // CANCEL REQUEST NOT DELETE REQUEST
        $request -> validate([
            'ride_id' => 'required|integer'
        ]);
        $token = Auth::user();

        $exists = Ride::where(['pickup_location'=> $request->pickup_location, 'destination_location' => $request -> destination_location, 'user_id' => $token -> user_id]) -> first(); // validate if there is a request by this user

        $ride = Ride::where(['pickup_location'=> $request->pickup_location, 'destination_location' => $request -> destination_location, 'user_id' => $token -> user_id]) -> get();

        if ($exists){
            if ($token->user_id == $ride[0]->user_id){
                Ride::where('ride_id', $ride[0]->ride_id)->update([
                    'status' => 'cancelled'
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => "Ride cancelled successfully",
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


        // 'driver_id' => ???  when driver accepts 
        // 'accepted_at' => when driver accepts
        public function acceptRide(Request $request){
            // the driver which is accepting
            // the ride id we are adding the driver to
            // change status to accepted
            $user = Auth::user();

            if ($user && $user -> role_id == 2){ // validate user's role
                $driver = Driver::where('user_id', $user->user_id) ->get(); // get the user in drivers table

                if ($driver){ // check if driver exists in table - get the driver_id of this driver
                    Rides::where('ride_id', $request -> ride_id)->update([
                        "status" => "accepted",
                        "driver_id" => $driver -> driver_id,
                        "accepted_at" => now(),
                    ]);
                } else {
                    return response() -> json([
                        "status" => "failed",
                        "message" => "Driver not found"
                    ]);
                }
            } else {
                return response() -> json([
                    "status" => "failed",
                    "message" => "Unauthorized"
                ]);
            }
            
        }
}