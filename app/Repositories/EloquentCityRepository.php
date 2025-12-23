<?php

namespace App\Repositories;

use App\Models\City;

class EloquentCityRepository implements CityRepositoryInterface
{
    public function create(City $city): City
    {
        // In a real Laravel app, this would save to the database
        $city->save();
        return $city;
    }

    public function update(int $id, array $data): ?City
    {
        // In a real Laravel app, this would update the database record
        $city = $this->find($id);
        if ($city) {
            foreach ($data as $key => $value) {
                $city->$key = $value;
            }
            $city->save();
        }
        return $city;
    }

    public function find(int $id): ?City
    {
        // In a real Laravel app, this would fetch from the database
        // For now, we'll return a new instance with the ID
        $city = new City(['id' => $id]);
        return $city;
    }

    public function all(array $filters = []): array
    {
        // In a real Laravel app, this would fetch from the database with filters
        // For now, we'll return an empty array
        return [];
    }

    public function delete(int $id): bool
    {
        // In a real Laravel app, this would delete from the database
        return true;
    }
}