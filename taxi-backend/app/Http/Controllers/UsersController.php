<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
// use Tymon\JWTAuth\Facades\JWTAuth;

class UsersController extends Controller
{

    public function deleteUser(Request $request){ // Authorize email

        $token = Auth::user(); // Note: error when token -> email is null. Meaning when user doesn't exist

            if ($token -> email == $request -> email){
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
            } else {
                return response() -> json([
                    'status' => 'failed',
                    'message' => 'Unauthorized',
                ]);
            }
    }

    public function updateUser(Request $request){ // Authorize email
        
        $token = Auth::user();
        echo $token -> email;
        
        if ($token -> email == $request -> email){
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
        } else {
            return response() -> json([
                'status' => 'failed',
                'message' => 'Unauthorized',
            ]);
        }
    }

    public function displayUser(Request $request){ // Authorize email

        $token = Auth::user();
        if ($token -> email == $request -> email){
            $user = User::where('email', $request -> email) -> first();
            if ($user){
                return response() -> json([
                    "email" => $user->email,
                    "first_name" => $user->first_name,
                    "last_name" => $user->last_name,
                ]);
            } else {
                return response() -> json([
                    'status' => 'failed',
                    'message' => 'User not found',
                ]);
            }
        } else {
            return response() -> json([
                'status' => 'failed',
                'message' => 'Unauthorized',
            ]);
        }
    }
}