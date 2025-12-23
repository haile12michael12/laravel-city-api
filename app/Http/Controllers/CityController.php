<?php

namespace App\Http\Controllers;

use App\CQRS\Commands\CreateCityCommand;
use App\CQRS\Commands\UpdateCityCommand;
use App\CQRS\Queries\GetCitiesQuery;
use App\CQRS\Handlers\CreateCityHandler;
use App\CQRS\Handlers\UpdateCityHandler;
use App\CQRS\Handlers\GetCitiesHandler;
use App\Http\Resources\CityResource;

class CityController
{
    public function __construct(
        private CreateCityHandler $createCityHandler,
        private UpdateCityHandler $updateCityHandler,
        private GetCitiesHandler $getCitiesHandler
    ) {}

    public function index(array $request = [])
    {
        $query = new GetCitiesQuery(
            search: $request['search'] ?? null,
            limit: $request['limit'] ?? null,
            offset: $request['offset'] ?? null
        );

        $cities = $this->getCitiesHandler->handle($query);

        return CityResource::collection($cities);
    }

    public function store(array $request)
    {
        $command = new CreateCityCommand(
            name: $request['name'],
            country: $request['country'],
            latitude: $request['latitude'],
            longitude: $request['longitude'],
            description: $request['description'] ?? null
        );

        $city = $this->createCityHandler->handle($command);

        return new CityResource($city);
    }

    public function show(int $id)
    {
        // For simplicity, we'll return a basic response
        // In a real app, you would fetch the city by ID
        return ['message' => 'City details for ID: ' . $id];
    }

    public function update(array $request, int $id)
    {
        $command = new UpdateCityCommand(
            id: $id,
            name: $request['name'] ?? null,
            country: $request['country'] ?? null,
            latitude: $request['latitude'] ?? null,
            longitude: $request['longitude'] ?? null,
            description: $request['description'] ?? null
        );

        $city = $this->updateCityHandler->handle($command);

        return new CityResource($city);
    }

    public function destroy(int $id)
    {
        // For simplicity, we'll return a basic response
        // In a real app, you would delete the city
        return ['message' => 'City deleted successfully'];
    }
}