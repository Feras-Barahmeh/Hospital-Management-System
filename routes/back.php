<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Department\DepartmentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function(){

    /*
    |--------------------------------------------------------------------------
    | authorised user routs
    |--------------------------------------------------------------------------
    |
    | Here all routs for authorised admin
    |
    */
    Route::middleware(['auth'])->prefix("user")->name("user.")->group(function () {
        /**
         * Dashboard user
         */
        Route::get('dashboard', function () {
            return view('dashboard.user.dashboard');
        })->name('dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | authorised admin routs
    |--------------------------------------------------------------------------
    |
    | Here all routs for authorised admin
    |
    */

    Route::middleware(['auth:admin'])->prefix("admin")->name("admin.")->group(function () {
        /**
         * Dashboard admin
         */
        Route::get('dashboard', function () {
            return view('dashboard.admin.dashboard');
        })->name('dashboard');

        /**
         * IDepartments Routes
         */
        Route::resource('departments', DepartmentsController::class);

    });

    require __DIR__.'/auth.php';
});

