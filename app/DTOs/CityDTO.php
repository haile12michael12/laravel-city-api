<?php

namespace App\DTOs;

class CityDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $country,
        public float $latitude,
        public float $longitude,
        public ?string $description = null,
        public ?string $created_at = null,
        public ?string $updated_at = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['country'],
            $data['latitude'],
            $data['longitude'],
            $data['description'] ?? null,
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}