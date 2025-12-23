<?php

namespace App\CQRS\Handlers;

use App\CQRS\Queries\GetCitiesQuery;
use App\Repositories\CityRepositoryInterface;
use App\Models\City;

class GetCitiesHandler
{
    public function __construct(
        private CityRepositoryInterface $cityRepository
    ) {}

    public function handle(GetCitiesQuery $query): array
    {
        $filters = [];
        if ($query->search) {
            $filters['search'] = $query->search;
        }

        return $this->cityRepository->all($filters);
    }
}