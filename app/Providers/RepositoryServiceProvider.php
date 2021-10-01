<?php

namespace App\Providers;

use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Repositories\Contracts\OwnerRepositoryInterface;
use App\Repositories\Contracts\PetRepositoryInterface;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use App\Repositories\Contracts\SpeciesRepositoryInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\OwnerRepository;
use App\Repositories\PetRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SpeciesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PetRepositoryInterface::class,
            PetRepository::class,
        );

        $this->app->bind(
            OwnerRepositoryInterface::class,
            OwnerRepository::class,
        );

        $this->app->bind(
            SpeciesRepositoryInterface::class,
            SpeciesRepository::class,
        );

        $this->app->bind(
            ServiceRepositoryInterface::class,
            ServiceRepository::class,
        );

        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class,
        );

        $this->app->bind(
            ScheduleRepositoryInterface::class,
            ScheduleRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
