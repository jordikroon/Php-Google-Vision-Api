<?php

namespace Vision\Annotation;

class TextProperty
{
    /**
     * @var DetectedLanguage[]
     */
    protected $detectedLanguages;

    /**
     * @var DetectedBreak|null
     */
    protected $detectedBreak;

    /**
     * @param DetectedLanguage[] $detectedLanguages
     * @param DetectedBreak|null $detectedBreak
     */
    public function __construct($detectedLanguages, $detectedBreak)
    {
        $this->detectedLanguages = $detectedLanguages;
        $this->detectedBreak = $detectedBreak;
    }

    /**
     * @return DetectedLanguage[]
     */
    public function getDetectedLanguages()
    {
        return $this->detectedLanguages;
    }

    /**
     * @param DetectedLanguage[] $detectedLanguages
     */
    public function setDetectedLanguages($detectedLanguages)
    {
        $this->detectedLanguages = $detectedLanguages;
    }

    /**
     * @return DetectedBreak
     */
    public function getDetectedBreak()
    {
        return $this->detectedBreak;
    }

    /**
     * @param DetectedBreak $detectedBreak
     */
    public function setDetectedBreak($detectedBreak)
    {
        $this->detectedBreak = $detectedBreak;
    }
}
