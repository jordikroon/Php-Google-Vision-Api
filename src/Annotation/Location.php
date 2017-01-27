<?php

namespace Vision\Annotation;

class Location
{
    /**
     * @var LatLng
     */
    protected $latLng;

    /**
     * @param LatLng $latLng
     */
    public function __construct(LatLng $latLng)
    {
        $this->latLng = $latLng;
    }

    /**
     * @return LatLng
     */
    public function getLatLng()
    {
        return $this->latLng;
    }

    /**
     * @param LatLng $latLng
     */
    public function setLatLng($latLng)
    {
        $this->latLng = $latLng;
    }
}
