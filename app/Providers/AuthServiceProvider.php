<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\CityPolicy;
use App\Models\City;

class AuthServiceProvider
{
    protected array $policies = [
        City::class => CityPolicy::class,
    ];

    public function register(): void
    {
        // Register any authentication / authorization services
    }

    public function boot(): void
    {
        // Register policies
    }
}