<?php

namespace App\Models;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public ?string $remember_token;
    public string $created_at;
    public string $updated_at;
    
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }
        
        // Set defaults if not provided
        if (!isset($this->id)) {
            $this->id = 0;
        }
        if (!isset($this->name)) {
            $this->name = '';
        }
        if (!isset($this->email)) {
            $this->email = '';
        }
        if (!isset($this->password)) {
            $this->password = '';
        }
        if (!isset($this->remember_token)) {
            $this->remember_token = null;
        }
        if (!isset($this->created_at)) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        if (!isset($this->updated_at)) {
            $this->updated_at = date('Y-m-d H:i:s');
        }
    }
}