<?php

namespace App\Providers;

use App\Repositories\Contracts\OwnerRepositoryInterface;
use App\Repositories\Contracts\PetRepositoryInterface;
use App\Repositories\Contracts\SpeciesRepositoryInterface;
use App\Repositories\OwnerRepository;
use App\Repositories\PetRepository;
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
