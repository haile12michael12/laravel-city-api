<?php

namespace App\Jobs;

use App\Models\City;

class NotifyCityCreated
{
    public function __construct(
        public City $city
    ) {}

    public function handle(): void
    {
        // Send notification about the new city
        // This could be an email, push notification, etc.
        error_log('New city created: ' . $this->city->name);
    }
}