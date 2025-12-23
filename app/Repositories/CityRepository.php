<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    private array $cities = [];
    private int $nextId = 1;

    public function create(City $city): City
    {
        $city->id = $this->nextId++;
        $this->cities[] = $city;
        return $city;
    }

    public function update(int $id, array $data): ?City
    {
        foreach ($this->cities as $index => $city) {
            if ($city->id === $id) {
                foreach ($data as $key => $value) {
                    $this->cities[$index]->$key = $value;
                }
                return $this->cities[$index];
            }
        }
        
        return null;
    }

    public function find(int $id): ?City
    {
        foreach ($this->cities as $city) {
            if ($city->id === $id) {
                return $city;
            }
        }
        
        return null;
    }

    public function all(array $filters = []): array
    {
        $cities = $this->cities;
        
        if (isset($filters['search'])) {
            $search = strtolower($filters['search']);
            $cities = array_filter($cities, function ($city) use ($search) {
                return strpos(strtolower($city->name), $search) !== false ||
                       strpos(strtolower($city->country), $search) !== false;
            });
        }
        
        return array_values($cities);
    }

    public function delete(int $id): bool
    {
        foreach ($this->cities as $index => $city) {
            if ($city->id === $id) {
                unset($this->cities[$index]);
                $this->cities = array_values($this->cities); // Re-index
                return true;
            }
        }
        
        return false;
    }
}