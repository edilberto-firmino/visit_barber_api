<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController; 
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CutGalleryController; 
use App\Http\Controllers\CutsTypeController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\OpeningHoursController;
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
Route::apiResource('schedules', SchedulesController::class);
Route::apiResource('openinghours', OpeningHoursController::class);
Route::apiResource('profilepicture', ProfilePictureController::class);
Route::apiResource('users', UserController::class);


