<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class PassengersController extends Controller
{
    // role id = 3 - create/signup for a passenger account 
    // request => "user_id","email","password","first_name","last_name","role_id"

    public function createPassenger(Request $request){

        $request->validate(['email' => 'required|string|email|unique:users', 'password' => 'required|string']);
            DB::table('users')->insert([
                'email' => $request -> email,
                'password' => bcrypt($request -> password),
                'first_name' => $request -> first_name,
                'last_name' => $request -> last_name,
                'role_id' => 3]);
                return response() -> json([
                    'status' => 'success',
                    'message' => 'User added successfuly',
                ]);
        }

    public function deletePassenger(Request $request){
        $user = User::where('email', $request -> email) -> first();

        if($user){
            $user -> delete();            
            return response() -> json([
                'status' => 'success',
                'message' => 'User deleted successfuly',
            ]);

        } else {
            return response() -> json([
                'status' => 'failed',
                'message' => 'User not found',
            ]);
        }
    }

    public function updatePassenger(Request $request){
        $user = User::where('email', $request -> email) -> first();

        if ($user){
            $user -> update([
                "first_name" => $request->first_name ?? $user->first_name,
                "last_name" => $request->last_name ?? $user->last_name,
            ]);
            echo "user updated";            
        } else {
            return response() -> json([
                'status' => 'failed',
                'message' => 'User not found',
            ]);
        }
    }

    public function readPassenger(Request $request){
        $user = User::where('email', $request -> email) -> first();
        if ($user){
            return response() -> json([
                "email" => $user->email,
                "first_name" => $user->first_name,
                "last_name" => $user->last_name
            ]);
        } else {
            return response() -> json([
                'status' => 'failed',
                'message' => 'User not found',
            ]);
        }
    }
}