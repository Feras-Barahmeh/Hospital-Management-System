<?php

namespace App\Providers;

use App\Interfaces\Repository\DatabasePackagesInterface;
use App\Interfaces\Repository\IAssistants;
use App\Interfaces\Repository\IDepartments;
use App\Interfaces\Repository\IDoctors;
use App\Repository\AssistantRepository;
use App\Repository\DepartmentRepository;
use App\Repository\DoctorRepository;
use App\Repository\PackagesRepository;
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
        $this->app->bind(IAssistants::class, AssistantRepository::class);
        $this->app->bind(DatabasePackagesInterface::class, PackagesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
