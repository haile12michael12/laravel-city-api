<?php

namespace App\Listeners;

use App\Events\CityCreated;

class StoreCityEvent
{
    public function handle(CityCreated $event): void
    {
        // Store the city event in the database
        error_log('City event stored for city: ' . $event->city->name);
    }
}