<?php

namespace App\Providers;

use App\Services\Contracts\OwnerServiceInterface;
use App\Services\Contracts\PetServiceInterface;
use App\Services\Contracts\SpeciesServiceInterface;
use App\Services\OwnerService;
use App\Services\PetService;
use App\Services\SpeciesService;
use Illuminate\Support\ServiceProvider;


class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PetServiceInterface::class,
            PetService::class,
        );

        $this->app->bind(
            OwnerServiceInterface::class,
            OwnerService::class,
        );

        $this->app->bind(
            SpeciesServiceInterface::class,
            SpeciesService::class,
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
