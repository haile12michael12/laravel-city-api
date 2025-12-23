<?php

namespace App\Providers;

use App\Repositories\CityRepositoryInterface;
use App\Repositories\CityRepository;

class AppServiceProvider
{
    public function register(): void
    {
        // Register repository bindings
        // In a real Laravel app, you would bind these in the container
    }

    public function boot(): void
    {
        // Boot any application services
    }
}