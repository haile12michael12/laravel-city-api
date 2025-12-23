<?php

namespace Database\Factories;

use App\Models\City;

class CityFactory
{
    public function create(array $attributes = []): City
    {
        $defaults = [
            'name' => 'Test City',
            'country' => 'Test Country',
            'latitude' => 0.0,
            'longitude' => 0.0,
            'description' => 'Test description',
        ];
        
        $data = array_merge($defaults, $attributes);
        
        return new City($data);
    }
}