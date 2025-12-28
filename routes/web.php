<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComplaintController as ComplaintAdmin;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Mahasiswa\ComplaintController as ComplaintMahasiswa;
use App\Http\Controllers\Mahasiswa\DashboardController as dashboardMahasiswa;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Group Mahasiswa
Route::middleware(['auth', 'verified', 'role:mahasiswa'])->group(function () {
    Route::get('/dashboard', [dashboardMahasiswa::class, 'index'])->name('dashboard');
    Route::resource('complaints', ComplaintMahasiswa::class);
});

// Group Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('complaints', ComplaintAdmin::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
