<?php

namespace App\Http\Resources;

use App\Models\City;

class CityResource
{
    public function __construct(
        public City $city
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->city->id,
            'name' => $this->city->name,
            'country' => $this->city->country,
            'latitude' => $this->city->latitude,
            'longitude' => $this->city->longitude,
            'description' => $this->city->description,
            'created_at' => $this->city->created_at ?? null,
            'updated_at' => $this->city->updated_at ?? null,
        ];
    }

    public static function collection(array $cities): array
    {
        return array_map(function ($city) {
            return (new self($city))->toArray();
        }, $cities);
    }
}