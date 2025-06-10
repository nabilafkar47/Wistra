<?php

namespace App;

trait HaversineTrait
{
    protected function calculateHaversineDistance($userLatitude, $userLongitude, $destLatitude, $destLongitude): float
    {
        // Step 1: Convert degrees to radians
        $lat1 = $userLatitude * pi() / 180;
        $lon1 = $userLongitude * pi() / 180;
        $lat2 = $destLatitude * pi() / 180;
        $lon2 = $destLongitude * pi() / 180;

        // Step 2: Calculate the differences
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        // Step 3: Apply the Haversine formula
        $radius = 6371; // Earth's radius in kilometers

        $distance = 2 * $radius * asin(sqrt(
            pow(sin($deltaLat / 2), 2) +
                cos($lat1) * cos($lat2) * pow(sin($deltaLon / 2), 2)
        ));

        return $distance; // Distance in kilometers
    }
}
