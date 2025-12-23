<?php

namespace Tests\Unit;

use App\Repositories\CityRepository;
use App\Models\City;

class CityRepositoryTest
{
    private CityRepository $repository;

    public function setUp(): void
    {
        $this->repository = new CityRepository();
    }

    public function test_can_create_city(): void
    {
        $city = new City([
            'name' => 'Test City',
            'country' => 'Test Country',
            'latitude' => 12.345678,
            'longitude' => 98.765432,
            'description' => 'Test description'
        ]);

        $result = $this->repository->create($city);

        $this->assertInstanceOf(City::class, $result);
        $this->assertGreaterThan(0, $result->id);
        $this->assertEquals($city->name, $result->name);
    }

    public function test_can_update_city(): void
    {
        $city = new City([
            'name' => 'Test City',
            'country' => 'Test Country',
            'latitude' => 12.345678,
            'longitude' => 98.765432
        ]);

        $createdCity = $this->repository->create($city);

        $updatedData = [
            'name' => 'Updated City',
            'country' => 'Updated Country'
        ];

        $result = $this->repository->update($createdCity->id, $updatedData);

        $this->assertInstanceOf(City::class, $result);
        $this->assertEquals($updatedData['name'], $result->name);
        $this->assertEquals($updatedData['country'], $result->country);
    }

    public function test_can_find_city(): void
    {
        $city = new City([
            'name' => 'Test City',
            'country' => 'Test Country',
            'latitude' => 12.345678,
            'longitude' => 98.765432
        ]);

        $createdCity = $this->repository->create($city);

        $result = $this->repository->find($createdCity->id);

        $this->assertInstanceOf(City::class, $result);
        $this->assertEquals($createdCity->id, $result->id);
        $this->assertEquals($createdCity->name, $result->name);
    }

    public function test_can_get_all_cities(): void
    {
        $city1 = new City([
            'name' => 'City 1',
            'country' => 'Country 1',
            'latitude' => 12.345678,
            'longitude' => 98.765432
        ]);

        $city2 = new City([
            'name' => 'City 2',
            'country' => 'Country 2',
            'latitude' => 23.456789,
            'longitude' => 87.654321
        ]);

        $this->repository->create($city1);
        $this->repository->create($city2);

        $result = $this->repository->all();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    public function test_can_delete_city(): void
    {
        $city = new City([
            'name' => 'Test City',
            'country' => 'Test Country',
            'latitude' => 12.345678,
            'longitude' => 98.765432
        ]);

        $createdCity = $this->repository->create($city);

        $result = $this->repository->delete($createdCity->id);

        $this->assertTrue($result);

        $foundCity = $this->repository->find($createdCity->id);
        $this->assertNull($foundCity);
    }
    
    private function assertTrue(mixed $condition): void
    {
        if (!$condition) {
            throw new \Exception('Assertion failed');
        }
    }
    
    private function assertInstanceOf(string $class, mixed $object): void
    {
        if (!($object instanceof $class)) {
            throw new \Exception('Instance of assertion failed');
        }
    }
    
    private function assertEquals(mixed $expected, mixed $actual): void
    {
        if ($expected !== $actual) {
            throw new \Exception('Equality assertion failed');
        }
    }
    
    private function assertIsArray(mixed $value): void
    {
        if (!is_array($value)) {
            throw new \Exception('Array assertion failed');
        }
    }
    
    private function assertCount(int $expected, array $array): void
    {
        if (count($array) !== $expected) {
            throw new \Exception('Count assertion failed');
        }
    }
    
    private function assertNull(mixed $value): void
    {
        if ($value !== null) {
            throw new \Exception('Null assertion failed');
        }
    }
    
    private function assertGreaterThan(mixed $expected, mixed $actual): void
    {
        if ($actual <= $expected) {
            throw new \Exception('Greater than assertion failed');
        }
    }
}