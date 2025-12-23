<?php

namespace App\Models;

class CityEvent
{
    public int $id;
    public int $city_id;
    public string $event_type;
    public array $event_data;
    public string $created_at;
    
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }
        
        // Set defaults if not provided
        if (!isset($this->id)) {
            $this->id = 0;
        }
        if (!isset($this->city_id)) {
            $this->city_id = 0;
        }
        if (!isset($this->event_type)) {
            $this->event_type = '';
        }
        if (!isset($this->event_data)) {
            $this->event_data = [];
        }
        if (!isset($this->created_at)) {
            $this->created_at = date('Y-m-d H:i:s');
        }
    }
}