<?php

namespace Vision\Annotation;

class LatLongRect
{
    /**
     * @var LatLng
     */
    protected $minLatLng;

    /**
     * @var LatLng
     */
    protected $maxLatLng;

    /**
     * @param LatLng $minLatLng
     * @param LatLng $maxLatLng
     */
    public function __construct(LatLng $minLatLng, LatLng $maxLatLng)
    {
        $this->minLatLng = $minLatLng;
        $this->maxLatLng = $maxLatLng;
    }

    /**
     * @return LatLng
     */
    public function getMinLatLng()
    {
        return $this->minLatLng;
    }

    /**
     * @param LatLng $minLatLng
     */
    public function setMinLatLng($minLatLng)
    {
        $this->minLatLng = $minLatLng;
    }

    /**
     * @return LatLng
     */
    public function getMaxLatLng()
    {
        return $this->maxLatLng;
    }

    /**
     * @param LatLng $maxLatLng
     */
    public function setMaxLatLng($maxLatLng)
    {
        $this->maxLatLng = $maxLatLng;
    }
}
