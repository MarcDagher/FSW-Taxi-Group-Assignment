<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    // role id = 3 - create/signup for a passenger account 
    // request => "user_id","email","password","first_name","last_name","role_id"

    public function createUser(Request $request){
        $role_id = $request->role_id;

        if (!$role_id || $role_id == 1){
            return response()->json(
                ["status" => "failed",
                "message" => "Invalid role type"]
            );
        } else {

        $request->validate(['email' => 'required|string|email|unique:users', 'password' => 'required|string']);
            DB::table('users')->insert([
                'email' => $request -> email,
                'password' => bcrypt($request -> password),
                'first_name' => $request -> first_name,
                'last_name' => $request -> last_name,
                'role_id' => $role_id]);
                return response() -> json([
                    'status' => 'success',
                    'message' => 'User added successfuly',
                ]);
        }
        }

    public function deleteUser(Request $request){
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

    public function updateUser(Request $request){
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

    public function displayUser(Request $request){
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