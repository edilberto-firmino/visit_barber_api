<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController; 
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CutGalleryController; 
use App\Http\Controllers\CutsTypeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\OpeningHourController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\UserController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('barber', BarberController::class);
Route::apiResource('client', ClientController::class);
Route::apiResource('address', AddressController::class);
Route::apiResource('cutgalery', CutGalleryController::class);
Route::apiResource('cutstype', CutsTypeController::class);
Route::apiResource('profilepicture', ProfilePictureController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('openinghours', OpeningHourController::class);
