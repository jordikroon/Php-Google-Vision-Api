<?php

namespace Vision\Annotation;

class CropHintsParams
{
    /**
     * @var float
     */
    protected $aspectRatios;

    /**
     * @param float $aspectRatios
     */
    public function __construct($aspectRatios)
    {
        $this->aspectRatios = $aspectRatios;
    }

    /**
     * @return float
     */
    public function getAspectRatios()
    {
        return $this->aspectRatios;
    }

    /**
     * @param float $aspectRatios
     */
    public function setAspectRatios($aspectRatios)
    {
        $this->aspectRatios = $aspectRatios;
    }
}
