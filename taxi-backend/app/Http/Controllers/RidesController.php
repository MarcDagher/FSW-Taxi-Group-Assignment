<?php

namespace App\Http\Controllers;

use App\Models\Driver;
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
            if ($exists->status === "cancelled"){
                $exists->update([
                    "status" => "accepted"
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Request created successfully'
                ]);
                
            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Request already exists'
                ]);
            }
        }
    }

    public function cancelRideRequest(Request $request){ 
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

    public function acceptRideRequest(Request $request){
        $user = Auth::user();

        if ($user && $user -> role_id == 2){ // validate user's role
            $driver = Driver::where('user_id', $user->user_id) ->get(); // get the user in drivers table

            if ($driver){ // check if driver exists in table - get the driver_id of this driver
                Ride::where('ride_id', $request -> ride_id)->update([
                    "status" => "accepted",
                    "driver_id" => $driver[0] -> driver_id,
                    "accepted_at" => now(),
                ]);
                return response() -> json([
                    "status" => "success",
                    "message" => "Ride accepted"
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


    public function readRides () {
        $user = Auth::user();

        if ($user && $user -> role_id == "2"){
            $rides = Ride::where("status", "pending")->get();
            return response()->json([
                "status" => "success",
                "rides" => $rides
            ]);
        } else {
            return response() -> json([
                "status" => "failed",
                "message" => "Unauthorized"
            ]);
        }
    } 
}