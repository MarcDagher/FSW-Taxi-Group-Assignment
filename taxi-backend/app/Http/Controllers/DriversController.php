<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{
//     public function __construct()
// {
//     $this->middleware('auth');
// }



    public function createDriver(Request $request)
    {
        $request->validate([
            'driver_license' => 'required|string|unique:drivers',
            'age' => 'required|integer|min:18', 
        ]);

        $role_id = 2;
        $driver_role = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role_id' => $role_id,
        ]);

        $driver = Driver::create([
            'driver_license' => $request->driver_license,
            'age' => $request->age,
            'user_id' => $driver_role->user_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Driver registered successfully',
            'user' => $driver_role,
            'driver' => $driver,
        ]);
    }
    public function loginDriver(Request $request)
    {   
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong credentials',
            ], 401);
        }

        $user = Auth::user();

        if ($user->role_id == 2) {
            $driver = Driver::where('user_id', $user->id)->first();

            if ($driver && $driver->driver_status == "verified") {
                return response()->json([
                    'status' => 'success',
                    'user' => $user,
                    'authorisation' => [
                        'token' => $token,
                        'type' => 'bearer',
                    ]
                ]);
            } else {
                Auth::logout(); // Log out the user if driver_status is not "verified"
                return response()->json(['status' => 'error', 'message' => "Your account is not verified. Please verify your email."], 403);
            }
        }

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
    public function readDriver(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user && ($user->role_id == 1 || $user->role_id == 2)) {
                $driver = Driver::find($request->input('driver_id'));

                if (!$driver) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Driver not found.',
                    ], 404);
                }

                return response()->json([
                    'status' => 'success',
                    'driver' => $driver,
                ]);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function index(){
        $driver = Driver::all();
        return response()->json(['message' => $driver]);
    }
    public function updateDriverStatus(Request $request)
{
    $user = Auth::user();

    if ($user && $user->role_id == 1) {
        $driver = Driver::find($request->driver_id);

        if ($driver) {
            $driver->update(['driver_status' => $request->driver_status]);

            return response()->json(['message' => 'Driver updated successfully']);
        } else {
            return response()->json(['error' => 'Driver not found.'], 404);
        }
    }

    return response()->json(['error' => 'Unauthorized'], 401);
}

    public function deleteDriver(Request $request)
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($user && $user->role_id == 1) {
            $id_driver = $request->driver_id;
            $driver = Driver::find($id_driver);

            if ($driver) {
                $driver->delete(); 

                return response()->json(['message' => 'Driver deleted successfully']);
            } else {
                return response()->json(['error' => 'Driver not found.'], 404);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
    
}
