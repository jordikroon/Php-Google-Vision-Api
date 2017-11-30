<?php

namespace Vision\Annotation;

class ImageContext
{
    /**
     * @var LatLongRect
     */
    protected $latLongRect;

    /**
     * @var string
     */
    protected $languageHints;

    /**
     * @var CropHintsParams
     */
    protected $cropHintsParams;

    /**
     * @return LatLongRect
     */
    public function getLatLongRect()
    {
        return $this->latLongRect;
    }

    /**
     * @param LatLongRect $latLongRect
     */
    public function setLatLongRect($latLongRect)
    {
        $this->latLongRect = $latLongRect;
    }

    /**
     * @return string
     */
    public function getLanguageHints()
    {
        return $this->languageHints;
    }

    /**
     * @param string $languageHints
     */
    public function setLanguageHints($languageHints)
    {
        $this->languageHints = $languageHints;
    }

    /**
     * @return CropHintsParams
     */
    public function getCropHintsParams()
    {
        return $this->cropHintsParams;
    }

    /**
     * @param CropHintsParams $cropHintsParams
     */
    public function setCropHintsParams($cropHintsParams)
    {
        $this->cropHintsParams = $cropHintsParams;
    }
}
