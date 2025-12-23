<?php

namespace App\Http\Requests;

class UpdateCityRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $country = null,
        public ?float $latitude = null,
        public ?float $longitude = null,
        public ?string $description = null
    ) {}

    public static function validate(array $data): self
    {
        // Validate only if values are provided
        if (isset($data['name']) && empty($data['name'])) {
            throw new \InvalidArgumentException('Name cannot be empty');
        }
        if (isset($data['country']) && empty($data['country'])) {
            throw new \InvalidArgumentException('Country cannot be empty');
        }
        if (isset($data['latitude']) && !is_numeric($data['latitude'])) {
            throw new \InvalidArgumentException('Latitude must be numeric');
        }
        if (isset($data['longitude']) && !is_numeric($data['longitude'])) {
            throw new \InvalidArgumentException('Longitude must be numeric');
        }

        return new self(
            $data['name'] ?? null,
            $data['country'] ?? null,
            isset($data['latitude']) ? (float)$data['latitude'] : null,
            isset($data['longitude']) ? (float)$data['longitude'] : null,
            $data['description'] ?? null
        );
    }
}