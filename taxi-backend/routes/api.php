<?php

use App\Http\Controllers\PassengersController;
use App\Http\Controllers\RatingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DriversController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});


Route::controller(DriversController::class)->group(function () {
Route::post('/createDriver','createDriver');
Route::post('/readDriver','readDriver');
Route::post('/updateDriverStatus','updateDriverStatus');
Route::post('/deleteDriver','deleteDriver');
Route::get('/drivers','index');
Route::post('/loginDriver','loginDriver');

});

Route::controller(RatingsController::class)->group(function(){
    Route::post('addRating', 'addRating');
});
Route::post('/signup', [PassengersController::class, 'createPassenger']);
Route::post('/delete', [PassengersController::class, 'deletePassenger']);
Route::post('/update', [PassengersController::class, 'updatePassenger']);
Route::post('/read', [PassengersController::class, 'readPassenger']);