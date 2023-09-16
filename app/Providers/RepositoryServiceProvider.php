<?php

namespace App\Providers;

use App\Interfaces\Repository\IDepartments;
use App\Interfaces\Repository\IDoctors;
use App\Repository\DepartmentRepository;
use App\Repository\DoctorRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IDepartments::class, DepartmentRepository::class);
        $this->app->bind(IDoctors::class, DoctorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
