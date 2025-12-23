<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\UpdateCityCommand;
use App\Repositories\CityRepositoryInterface;
use App\Models\City;

class UpdateCityHandler
{
    public function __construct(
        private CityRepositoryInterface $cityRepository
    ) {}

    public function handle(UpdateCityCommand $command): ?City
    {
        $data = array_filter([
            'name' => $command->name,
            'country' => $command->country,
            'latitude' => $command->latitude,
            'longitude' => $command->longitude,
            'description' => $command->description,
        ], function ($value) {
            return $value !== null;
        });

        return $this->cityRepository->update($command->id, $data);
    }
}