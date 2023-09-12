<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth'])->prefix("user")->name("user.")->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.user.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:admin'])->prefix("admin")->name("admin.")->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.admin.dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
