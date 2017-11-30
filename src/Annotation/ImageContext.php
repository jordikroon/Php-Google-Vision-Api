<?php

namespace Vision\Annotation;

class ImageContext
{
    /**
     * @var LatLongRect
     */
    protected $latLongRect;

    /**
     * @var array
     */
    protected $languageHints = [];

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
     * @return array
     */
    public function getLanguageHints()
    {
        return $this->languageHints;
    }

    /**
     * @param array $languageHints
     */
    public function setLanguageHints($languageHints)
    {
        $this->languageHints = $languageHints;
    }

    /**
     * @param string $language
     * @param string $hint
     */
    public function addLanguageHint($language, $hint)
    {
        $this->languageHints[$language] = $hint;
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
