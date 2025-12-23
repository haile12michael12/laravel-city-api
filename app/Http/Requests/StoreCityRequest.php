<?php

namespace App\Http\Requests;

class StoreCityRequest
{
    public function __construct(
        public string $name,
        public string $country,
        public float $latitude,
        public float $longitude,
        public ?string $description = null
    ) {}

    public static function validate(array $data): self
    {
        // Basic validation
        if (empty($data['name'])) {
            throw new \InvalidArgumentException('Name is required');
        }
        if (empty($data['country'])) {
            throw new \InvalidArgumentException('Country is required');
        }
        if (!isset($data['latitude']) || !is_numeric($data['latitude'])) {
            throw new \InvalidArgumentException('Latitude is required and must be numeric');
        }
        if (!isset($data['longitude']) || !is_numeric($data['longitude'])) {
            throw new \InvalidArgumentException('Longitude is required and must be numeric');
        }

        return new self(
            $data['name'],
            $data['country'],
            (float)$data['latitude'],
            (float)$data['longitude'],
            $data['description'] ?? null
        );
    }
}