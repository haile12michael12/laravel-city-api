<?php

namespace App\Services;

use App\Repositories\CityRepositoryInterface;
use App\Models\City;
use App\Events\CityCreated;
use App\Events\CityUpdated;
use App\Jobs\NotifyCityCreated;

class CityService
{
    public function __construct(
        private CityRepositoryInterface $cityRepository
    ) {}

    public function createCity(array $data): City
    {
        $city = new City($data);
        $createdCity = $this->cityRepository->create($city);

        // Dispatch event
        $cityCreatedEvent = new CityCreated($createdCity);
        // In a real Laravel app, you would dispatch the event

        // Dispatch job
        $notifyJob = new NotifyCityCreated($createdCity);
        $notifyJob->handle(); // For simplicity, handle immediately

        return $createdCity;
    }

    public function updateCity(int $id, array $data): ?City
    {
        $updatedCity = $this->cityRepository->update($id, $data);

        if ($updatedCity) {
            // Dispatch event
            $cityUpdatedEvent = new CityUpdated($updatedCity);
            // In a real Laravel app, you would dispatch the event
        }

        return $updatedCity;
    }

    public function getCity(int $id): ?City
    {
        return $this->cityRepository->find($id);
    }

    public function getAllCities(array $filters = []): array
    {
        return $this->cityRepository->all($filters);
    }

    public function deleteCity(int $id): bool
    {
        return $this->cityRepository->delete($id);
    }
}