<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\LatLng;
use Vision\Annotation\LatLongRect;
use Zend\Hydrator\Strategy\StrategyInterface;

class LatLongRectStrategy implements StrategyInterface
{
    /**
     * @param LatLongRect $value
     * @return array|null
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
     * @return LatLongRect|null
     */
    public function hydrate($value)
    {
        $minLatLng = $this->getIfExists($value, 'minLatLng');
        $maxLatLng = $this->getIfExists($value, 'maxLatLng');

        if (!$minLatLng && !$maxLatLng) {
            return null;
        }

        return new LatLongRect(
            new LatLng($this->getIfExists($minLatLng, 'latitude'), $this->getIfExists($minLatLng, 'longitude')),
            new LatLng($this->getIfExists($maxLatLng, 'latitude'), $this->getIfExists($maxLatLng, 'longitude'))
        );
    }

    /**
     * @param array $variable
     * @param string $key
     * @return mixed
     */
    protected function getIfExists($variable, $key)
    {
        return $variable && isset($variable[$key]) ? $variable[$key] : null;
    }
}
