<?php

namespace App\CQRS\Commands;

class UpdateCityCommand
{
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $country = null,
        public ?float $latitude = null,
        public ?float $longitude = null,
        public ?string $description = null
    ) {}
}