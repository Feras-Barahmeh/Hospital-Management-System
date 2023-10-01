<?php

use App\Http\Controllers\Dashboard\AssistantsController;
use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\DoctorController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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
        ->group(function () {

                /**
                 * Livewire
                 */
                Livewire::setUpdateRoute(function ($handle) {
                        return Route::post('/livewire/update', $handle);
                });

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
                         * Departments Routes
                         */
                        Route::resource('departments', DepartmentsController::class);

                        /**
                         * Doctors
                         */
                        Route::resource('doctors', DoctorController::class);

                        Route::delete('purge', [DoctorController::class, 'purge'])
                                ->name('purge');

                        Route::prefix('doctors')->name('doctors.')->controller(DoctorController::class)->group(function () {

                                Route::post('reset-password', 'resetPassword')->name('reset-password');
                                Route::post('toggle-status', 'toggleStatus')->name('toggle-status');
                        });

                        /**
                         * Assistants
                         */
                        Route::resource('assistants', AssistantsController::class);

                        Route::prefix('assistants')->name('assistants.')->controller(AssistantsController::class)->group(function () {
                                Route::post('toggle-status/{id}', 'toggleStatus')->name('toggle-status');
                        });



                        Route::get('packages', function () {
                                return view('livewire.packages.packages');
                        })->name('packages');


                });

                require __DIR__ . '/auth.php';
        });
