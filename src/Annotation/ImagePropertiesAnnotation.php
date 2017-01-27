<?php

namespace Vision\Annotation;

class ImagePropertiesAnnotation
{
    /**
     * @var DominantColor[]
     */
    protected $dominantColors;

    /**
     * @return DominantColor[]
     */
    public function getDominantColors()
    {
        return $this->dominantColors;
    }

    /**
     * @param DominantColor[] $dominantColors
     */
    public function setDominantColors($dominantColors)
    {
        $this->dominantColors = $dominantColors;
    }
}
