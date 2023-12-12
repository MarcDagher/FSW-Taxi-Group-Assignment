<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{
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
    public function readDriver(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user && $user->role_id == 1) {
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
    public function updateDriverStatus(Request $request)
{
    $request->validate([
        'driver_id' => 'required|integer',
        'status' => 'required|in:verified,unverified',
    ]);

    if (Auth::check()) {
        $user = Auth::user();

        if ($user && $user->role_id == 1) {
            $driver = Driver::find($request->driver_id);

            if (!$driver) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Driver not found.',
                ], 404);
            }

            $driver->update([
                'status' => $request->driver_status,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Driver status updated successfully',
                'driver' => $driver,
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

}
