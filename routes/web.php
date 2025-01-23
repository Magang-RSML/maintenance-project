<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WorkOrderController;

// Halaman Dashboard
Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');

// Routes untuk User Management (Admin)
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::resource('users', UserController::class)->except(['show']);

// Routes untuk Room Management
Route::get('/rooms', [\App\Http\Controllers\RoomController::class, 'index'])->name('rooms.index');
Route::resource('rooms', RoomController::class)->except(['show']);

// Routes untuk Device Management
Route::get('/devices', [\App\Http\Controllers\DeviceController::class, 'index'])->name('devices.index');
Route::resource('devices', DeviceController::class)->except(['show']);

// Routes untuk Work Order Management
Route::get('/workorders', [\App\Http\Controllers\WorkOrderController::class, 'index'])->name('workorders.index');
Route::resource('workorders', WorkOrderController::class)->except(['show']);
