<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Ride;

class RatingsController extends Controller
{

    public function addRating(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // //checking if rating already rated
            // $rating = Rating::where('user_id', $user->user_id)
            // ->where('rating_for', $request->rating_for)
            // ->get();

            // if($rating->count() > 0){
            //     return response()->json([
            //         'status' => 'failed',
            //         'message' => 'You have already rated this ride'
            //     ], 422);
            // }

            //checking for the ride if found
            $ride = Ride::where('user_id', $user->user_id)
                ->where('ride_id', $request->ride_id)
                ->get();
            

            if ($ride->count() > 0) {
                $rating = new Rating();
                $rating->rating = $request->rating;
                $rating->rating_by = $user->user_id;
                $rating->rating_for = $request->rating_for;
                $rating->ride_id = $request->ride_id;
                $rating->save();

                return response()->json([
                    'status' => 'status',
                    'message' => 'Rating added successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 'status',
                    'message' => 'Ride not found',
                ]);
            }

        } else {
            return response()->json([
                'status' => 'failed',
                'error' => 'Unauthorised'
            ], 401);
        }
    }

}
