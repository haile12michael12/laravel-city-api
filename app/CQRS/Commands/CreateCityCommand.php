<?php

namespace App\CQRS\Commands;

class CreateCityCommand
{
    public function __construct(
        public string $name,
        public string $country,
        public float $latitude,
        public float $longitude,
        public ?string $description = null
    ) {}
}