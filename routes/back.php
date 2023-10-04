<?php

use App\Http\Controllers\Dashboard\AmbulancesController;
use App\Http\Controllers\Dashboard\AssistantsController;
use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsurancesController;
use App\Http\Controllers\Dashboard\AssistantInvoicesController;
use App\Http\Controllers\Dashboard\PackagesController;
use App\Http\Controllers\Dashboard\PatientsController;
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


                        /**
                         * Packages
                         */
                        Route::resource('packages', PackagesController::class);
                        Route::prefix('packages')->name('packages.')->controller(PackagesController::class)->group(function () {
                                Route::post('toggle-status', 'toggleStatus')->name('toggle-status');
                        });

                        /**
                         * Insurance companies
                         */
                        Route::resource('insurances', InsurancesController::class);
                        Route::prefix('insurances')->name('insurances.')->controller(InsurancesController::class)->group(function () {
                                Route::put('toggle-status/{id}', 'toggleStatus')->name('toggle-status');
                        });

                        /**
                         * Ambulance
                         */

                        Route::resource('ambulances', AmbulancesController::class);
                        Route::prefix('ambulances')->name('ambulances.')->controller(AmbulancesController::class)->group(function () {
                                Route::put('toggle-available/{id}', 'toggleAvailable')->name('toggle-available');
                        });

                        /**
                         * Patients
                         */
                        Route::resource('patients', PatientsController::class);

                        /**
                         * invoices assistants
                         */
                        Route::resource('invoices-assistants', AssistantInvoicesController::class);

                });

                require __DIR__ . '/auth.php';
        });
