<?php

namespace App\CQRS\Queries;

class GetCitiesQuery
{
    public function __construct(
        public ?string $search = null,
        public ?int $limit = null,
        public ?int $offset = null
    ) {}
}