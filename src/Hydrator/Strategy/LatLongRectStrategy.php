<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\LatLng;
use Vision\Annotation\LatLongRect;
use Zend\Hydrator\Strategy\StrategyInterface;

class LatLongRectStrategy implements StrategyInterface
{
    /**
     * @param LatLongRect $value
     * @return array
     */
    public function extract($value)
    {
        if (!$value) {
            return null;
        }

        $minLatLng = $value->getMinLatLng();
        $maxLatLng = $value->getMaxLatLng();

        return array_filter([
            'minLatLng' => array_filter([
                'latitude' => $minLatLng ? $minLatLng->getLatitude() : null,
                'longitude' => $minLatLng ? $minLatLng->getLongitude() : null,
            ]),
            'maxLatLng' => array_filter([
                'latitude' => $maxLatLng ? $maxLatLng->getLatitude() : null,
                'longitude' => $maxLatLng ? $maxLatLng->getLongitude() : null,
            ])
        ]);
    }

    /**
     * @param array $value
     * @return LatLongRect
     */
    public function hydrate($value)
    {
        $minLatLng = isset($value['minLatLng']) ? $value['minLatLng'] : null;
        $maxLatLng = isset($value['maxLatLng']) ? $value['maxLatLng'] : null;

        if (!$minLatLng && !$maxLatLng) {
            return null;
        }

        return new LatLongRect(
            new LatLng(
                isset($minLatLng['latitude']) ? $minLatLng['latitude'] : null,
                isset($minLatLng['longitude']) ? $minLatLng['longitude'] : null
            ),
            new LatLng(
                isset($maxLatLng['latitude']) ? $maxLatLng['latitude'] : null,
                isset($maxLatLng['longitude']) ? $maxLatLng['longitude'] : null
            )
        );
    }
}
