<?php

namespace App\Events;

use App\Models\City;

class CityCreated
{
    public function __construct(
        public City $city
    ) {}
}