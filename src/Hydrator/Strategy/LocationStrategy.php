<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\LatLng;
use Vision\Annotation\Location;
use Zend\Hydrator\Strategy\StrategyInterface;

class LocationStrategy implements StrategyInterface
{
    /**
     * @param Location[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Location $location) {
            return [
                'latLng' => [
                    'latitude' => $location->getLatLng()->getLatitude(),
                    'longitude' => $location->getLatLng()->getLongitude()
                ]
            ];
        }, $value);
    }

    /**
     * @param array $value
     * @return Location[]
     */
    public function hydrate($value)
    {
        $locations = [];

        foreach ($value as $locationInfo) {
            $latLng = $locationInfo['latLng'];
            $locations[] = new Location(new LatLng($latLng['latitude'], $latLng['longitude']));
        }

        return $locations;
    }
}
