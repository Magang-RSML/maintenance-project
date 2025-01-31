<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\ITStaff\ITStaffController;
use App\Http\Controllers\ProfileController;

// Redirect berdasarkan level user setelah login
Route::get('/redirect', function () {
    $user = Auth::user(); // Gunakan Auth::user() untuk menghindari error "Undefined method 'user'"

    if (!$user) {
        return redirect()->route('login'); // Jika tidak ada user, arahkan ke login
    }

    return match ($user->level) {
        'admin' => redirect()->route('admin.dashboard'),
        'it_staff' => redirect()->route('it_staff.dashboard'),
        'employee' => redirect()->route('employee.dashboard'),
        default => redirect()->route('login'),
    };
})->middleware('auth');

// Halaman Admin (hanya untuk level admin)
Route::middleware(['auth', 'user_level:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class)->names('admin.users');
        Route::resource('rooms', RoomController::class)->names('admin.rooms');
        Route::resource('devices', DeviceController::class)->names('admin.devices');
        Route::resource('workorders', WorkOrderController::class)->names('admin.workorders');
        Route::view('/dashboard', 'admin.dashboard.index')->name('admin.dashboard');
    });
});

// Halaman IT Staff (hanya untuk level it_staff)
Route::middleware(['auth', 'user_level:it_staff'])->group(function () {
    Route::get('/it_staff/dashboard', [ITStaffController::class, 'index'])->name('it_staff.dashboard');
    Route::prefix('it_staff')->group(function () {
        Route::resource('devices', DeviceController::class)->names('it_staff.devices');
        Route::resource('workorders', WorkOrderController::class)->names('it_staff.workorders');
        Route::view('/dashboard', 'it_staff.dashboard.index')->name('it_staff.dashboard');
    });
});

// Halaman Employee (hanya untuk level employee)
Route::middleware(['auth', 'user_level:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    Route::prefix('employee')->group(function () {
        Route::resource('devices', DeviceController::class)->names('employee.devices');
        Route::resource('workorders', WorkOrderController::class)->names('employee.workorders');
        Route::view('/dashboard', 'employee.dashboard.index')->name('employee.dashboard');
    });
});

// Auth Routes (Breeze sudah otomatis mengatur ini)
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Default dashboard (bawaan Laravel)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
