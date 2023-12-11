<?php

use App\Http\Controllers\PassengersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/signup', [PassengersController::class, 'createPassenger']);
Route::post('/delete', [PassengersController::class, 'deletePassenger']);
Route::post('/update', [PassengersController::class, 'updatePassenger']);
Route::post('/read', [PassengersController::class, 'readPassenger']);