<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WorkOrderController;

Route::resource('users', UserController::class);
Route::resource('rooms', RoomController::class);
Route::resource('devices', DeviceController::class);
Route::resource('work-orders', WorkOrderController::class);

Route::get('/', function () {
    return view('welcome');
});
