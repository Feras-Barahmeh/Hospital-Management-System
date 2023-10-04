<?php

namespace App\Providers;

use App\Interfaces\Repository\DatabaseInsurancesInterface;
use App\Interfaces\Repository\DatabaseInvoicesInterface;
use App\Interfaces\Repository\DatabasePackagesInterface;
use App\Interfaces\Repository\IAssistants;
use App\Interfaces\Repository\IDepartments;
use App\Interfaces\Repository\IDoctors;
use App\Repository\AssistantRepository;
use App\Repository\DepartmentRepository;
use App\Repository\DoctorRepository;
use App\Repository\InsuranceRepository;
use App\Repository\AssistantInvoicesRepository;
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
        $this->app->bind(DatabaseInsurancesInterface::class, InsuranceRepository::class);
        $this->app->bind(DatabaseInvoicesInterface::class, AssistantInvoicesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
