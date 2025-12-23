<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\CreateCityCommand;
use App\Repositories\CityRepositoryInterface;
use App\Models\City;

class CreateCityHandler
{
    public function __construct(
        private CityRepositoryInterface $cityRepository
    ) {}

    public function handle(CreateCityCommand $command): City
    {
        $city = new City([
            'name' => $command->name,
            'country' => $command->country,
            'latitude' => $command->latitude,
            'longitude' => $command->longitude,
            'description' => $command->description,
        ]);

        return $this->cityRepository->create($city);
    }
}