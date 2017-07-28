<?php

namespace Vision\Annotation;

class DetectedLanguage
{
    /**
     * @var string
     */
    protected $languageCode;

    /**
     * @var float|null
     */
    protected $confidence;

    /**
     * @param string $languageCode
     * @param float $confidence
     */
    public function __construct($languageCode, $confidence = null)
    {
        $this->languageCode = $languageCode;
        $this->confidence = $confidence;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return float|null
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param float|null $confidence
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;
    }
}
