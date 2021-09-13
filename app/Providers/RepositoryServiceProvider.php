<?php

namespace App\Providers;

use App\Repositories\Contracts\PetRepositoryInterface;
use App\Repositories\PetRepository;
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
