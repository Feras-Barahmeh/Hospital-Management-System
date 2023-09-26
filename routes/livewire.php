<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Livewire Routes
|--------------------------------------------------------------------------
|
| Here routes for livewire to pass not found page error.
|  This error for
|   ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
| middleware
|
*/



Route::middleware(['auth:admin'])->prefix("admin")->name("admin.")->group(function () {
    /**
     * Packages
     */
    Route::get('packages', function () {
        return view('livewire.packages.packages');
    })->name('packages');

});
