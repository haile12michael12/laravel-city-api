<?php

namespace App\Events;

use App\Models\City;

class CityUpdated
{
    public function __construct(
        public City $city
    ) {}
}