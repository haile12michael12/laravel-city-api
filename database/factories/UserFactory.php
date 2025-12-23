<?php

namespace Database\Factories;

use App\Models\User;

class UserFactory
{
    public function create(array $attributes = []): User
    {
        $defaults = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ];
        
        $data = array_merge($defaults, $attributes);
        
        return new User($data);
    }
}