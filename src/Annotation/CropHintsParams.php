<?php

namespace Vision\Annotation;

class CropHintsParams
{
    /**
     * @var array
     */
    protected $aspectRatios = [];

    /**
     * @param array $aspectRatios
     */
    public function __construct(array $aspectRatios = [])
    {
        $this->aspectRatios = $aspectRatios;
    }

    /**
     * @return array
     */
    public function getAspectRatios()
    {
        return $this->aspectRatios;
    }

    /**
     * @param array $aspectRatios
     */
    public function setAspectRatios($aspectRatios)
    {
        $this->aspectRatios = $aspectRatios;
    }
}
