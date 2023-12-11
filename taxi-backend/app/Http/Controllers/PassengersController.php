<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassengersController extends Controller
{
    // role id = 3 - create/signup for a passenger account 
    // request => "user_id","email","password","first_name","last_name","role_id"
    public function createPassenger(Request $request){
        $user = User::where('email', $request -> email)->first();

        if ($user){
            return response()->json([
                'status' => 'failed',
                'message' => 'User email already exists'
            ]);
        } else {
                DB::table('users')->insert([
                    'email' => $request -> email,
                    'password' => bcrypt($request -> password),
                    'first_name' => $request -> first_name,
                    'last_name' => $request -> last_name,
                    'role_id' => 3
                ]);
                echo "Passenger added successfully";
            // 'email' => $request -> email,
        } 
    }
}
