<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengersRequestsController extends Controller
{
    public function createRequest(Request $req){
        // get user id from token
        // get pickup_location, destination_location from request
        // status is pending by default
        $token = Auth::user();
        echo $token -> user_id;
        echo "done";
    }
}
