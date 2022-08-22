<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/division', App\Http\Controllers\Api\DivisionController::class);
Route::apiResource('/position', App\Http\Controllers\Api\PositionController::class);
Route::apiResource('/employee', App\Http\Controllers\Api\EmployeeController::class);
Route::apiResource('/attendance', App\Http\Controllers\Api\AttendanceController::class);
Route::apiResource('/payment', App\Http\Controllers\Api\PaymentController::class);
