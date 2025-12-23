<?php

namespace App\Policies;

use App\Models\User;
use App\Models\City;

class CityPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // For simplicity, allow all users to view cities
    }

    public function view(User $user, City $city): bool
    {
        return true; // For simplicity, allow all users to view any city
    }

    public function create(User $user): bool
    {
        return true; // For simplicity, allow all users to create cities
    }

    public function update(User $user, City $city): bool
    {
        return true; // For simplicity, allow all users to update any city
    }

    public function delete(User $user, City $city): bool
    {
        return $user->id === 1; // For simplicity, only admin can delete
    }

    public function restore(User $user, City $city): bool
    {
        return false; // Not implemented
    }

    public function forceDelete(User $user, City $city): bool
    {
        return false; // Not implemented
    }
}