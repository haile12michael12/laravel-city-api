<?php

namespace App\Support;

class Helpers
{
    /**
     * Format coordinates for display
     */
    public static function formatCoordinates(float $latitude, float $longitude): string
    {
        return sprintf('%.6f, %.6f', $latitude, $longitude);
    }

    /**
     * Calculate distance between two coordinates using Haversine formula
     */
    public static function calculateDistance(
        float $lat1, 
        float $lon1, 
        float $lat2, 
        float $lon2
    ): float {
        $earthRadius = 6371; // Earth's radius in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    /**
     * Validate if coordinates are within valid ranges
     */
    public static function validateCoordinates(float $latitude, float $longitude): bool
    {
        return $latitude >= -90 && $latitude <= 90 && 
               $longitude >= -180 && $longitude <= 180;
    }
}