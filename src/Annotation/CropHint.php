<?php

namespace Vision\Annotation;

class CropHint
{
    /**
     * @var BoundingPoly
     */
    protected $boundingPoly;

    /**
     * @var integer
     */
    protected $confidence;

    /**
     * @var integer
     */
    protected $importanceFraction;

    /**
     * @param BoundingPoly $boundingPoly
     * @param int $confidence
     * @param int $importanceFraction
     */
    public function __construct(BoundingPoly $boundingPoly, $confidence, $importanceFraction)
    {
        $this->boundingPoly = $boundingPoly;
        $this->confidence = $confidence;
        $this->importanceFraction = $importanceFraction;
    }

    /**
     * @return BoundingPoly
     */
    public function getBoundingPoly()
    {
        return $this->boundingPoly;
    }

    /**
     * @param BoundingPoly $boundingPoly
     */
    public function setBoundingPoly($boundingPoly)
    {
        $this->boundingPoly = $boundingPoly;
    }

    /**
     * @return int
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param int $confidence
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;
    }

    /**
     * @return int
     */
    public function getImportanceFraction()
    {
        return $this->importanceFraction;
    }

    /**
     * @param int $importanceFraction
     */
    public function setImportanceFraction($importanceFraction)
    {
        $this->importanceFraction = $importanceFraction;
    }
}
