<?php

namespace App\Repositories;

use App\Models\City;

interface CityRepositoryInterface
{
    public function create(City $city): City;
    public function update(int $id, array $data): ?City;
    public function find(int $id): ?City;
    public function all(array $filters = []): array;
    public function delete(int $id): bool;
}