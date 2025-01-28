<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WorkOrderController;

Route::middleware(['auth', 'userLevel'])->group(function () {
    // Rute untuk Admin
    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class)->names('admin.users');
        Route::resource('rooms', RoomController::class)->names('admin.rooms');
        Route::resource('devices', DeviceController::class)->names('admin.devices');
        Route::resource('workorders', WorkOrderController::class)->names('admin.workorders');
        Route::view('/dashboard', 'admin.dashboard.index')->name('admin.dashboard');
    });

    // Rute untuk IT Staff
    Route::prefix('it-staff')->group(function () {
        Route::resource('devices', DeviceController::class)->names('it_staff.devices');
        Route::resource('workorders', WorkOrderController::class)->names('it_staff.workorders');
        Route::view('/dashboard', 'it_staff.dashboard.index')->name('it_staff.dashboard');
    });

    // Rute untuk Employee
    Route::prefix('employee')->group(function () {
        Route::resource('devices', DeviceController::class)->names('employee.devices');
        Route::resource('workorders', WorkOrderController::class)->names('employee.workorders');
        Route::view('/dashboard', 'employee.dashboard.index')->name('employee.dashboard');
    });
});