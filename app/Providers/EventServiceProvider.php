<?php

namespace App\Providers;

use App\Events\CityCreated;
use App\Listeners\StoreCityEvent;

class EventServiceProvider
{
    protected array $listen = [
        CityCreated::class => [
            StoreCityEvent::class,
        ],
    ];

    public function register(): void
    {
        // Register any events for your application
    }

    public function boot(): void
    {
        // Boot any events for your application
    }
}