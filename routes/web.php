<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index'); // Match the file name without .blade.php
});

Route::resource('employees', EmployeeController::class);
Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
Route::post('/leave-request', [LeaveController::class, 'store'])->name('leaves.store');
Route::get('/leaves/{leave}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
Route::put('/leaves/{leave}', [LeaveController::class, 'update'])->name('leaves.update');
Route::delete('/leaves/{leave}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
Route::resource('leaves', LeaveController::class);
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/attendance/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
Route::delete('/attendance/{attendance}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');



