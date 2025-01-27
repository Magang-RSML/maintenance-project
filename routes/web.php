<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WorkOrderController;

// Rute untuk Admin
Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('devices', DeviceController::class);
    Route::resource('workorders', WorkOrderController::class);
    Route::view('/dashboard', 'admin.dashboard.index')->name('admin.dashboard');
    Route::view('/users', 'admin.users.index')->name('admin.users.index');
    Route::view('/users/create', 'admin.users.create')->name('admin.users.create');
    Route::view('/users/edit', 'admin.users.edit')->name('admin.users.edit');
    Route::view('/rooms', 'admin.rooms.index')->name('admin.rooms.index');
    Route::view('/rooms/create', 'admin.rooms.create')->name('admin.rooms.create');
    Route::view('/rooms/edit', 'admin.rooms.edit')->name('admin.rooms.edit');
    Route::view('/devices', 'admin.devices.index')->name('admin.devices.index');
    Route::view('/devices/create', 'admin.devices.create')->name('admin.devices.create');
    Route::view('/devices/edit', 'admin.devices.edit')->name('admin.devices.edit');
    Route::view('/workorders', 'admin.workorders.index')->name('admin.workorders.index');
    Route::view('/workorders/create', 'admin.workorders.create')->name('admin.workorders.create');
    Route::view('/workorders/edit', 'admin.workorders.edit')->name('admin.workorders.edit');
});

// Rute untuk IT Staff
Route::prefix('it-staff')->group(function () {
    Route::resource('devices', DeviceController::class)->only(['index', 'show']);
    Route::resource('workorders', WorkOrderController::class)->only(['index', 'create', 'edit']);
    Route::view('/dashboard', 'it_staff.dashboard.index')->name('it_staff.dashboard');
    Route::view('/devices', 'it_staff.devices.index')->name('it_staff.devices.index');
    // Route::view('/devices/create', 'it_staff.devices.create')->name('it_staff.devices.create');
    // Route::view('/devices/edit', 'it_staff.devices.edit')->name('it_staff.devices.edit');
    Route::view('/workorders', 'it_staff.workorders.index')->name('it_staff.workorders.index');
    // Route::view('/workorders/create', 'it_staff.workorders.create')->name('it_staff.workorders.create');
    // Route::view('/workorders/edit', 'it_staff.workorders.edit')->name('it_staff.workorders.edit');
});

// Rute untuk Employee
Route::prefix('employee')->group(function () {
    Route::resource('devices', DeviceController::class)->only(['index', 'show']);
    Route::resource('workorders', WorkOrderController::class)->only(['index', 'create']);
    Route::view('/dashboard', 'employee.dashboard.index')->name('employee.dashboard');
    Route::view('/devices', 'employee.devices.index')->name('employee.devices.index');
    // Route::view('/devices/create', 'employee.devices.create')->name('employee.devices.create');
    // Route::view('/devices/edit', 'employee.devices.edit')->name('employee.devices.edit');
    Route::view('/workorders', 'employee.workorders.index')->name('employee.workorders.index');
    // Route::view('/workorders/create', 'employee.workorders.create')->name('employee.workorders.create');
    // Route::view('/workorders/edit', 'employee.workorders.edit')->name('employee.workorders.edit');
});
