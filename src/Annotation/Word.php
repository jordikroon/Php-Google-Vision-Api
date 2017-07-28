<?php

namespace Vision\Annotation;

class Word
{
    /**
     * @var TextProperty
     */
    protected $property;

    /**
     * @var BoundingPoly
     */
    protected $boundingBox;

    /**
     * @var Symbol[]
     */
    protected $symbols = [];

    /**
     * @param TextProperty $property
     * @param BoundingPoly $boundingBox
     * @param Symbol[] $symbols
     */
    public function __construct(TextProperty $property, BoundingPoly $boundingBox, array $symbols)
    {
        $this->property = $property;
        $this->boundingBox = $boundingBox;
        $this->symbols = $symbols;
    }

    /**
     * @return TextProperty
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param TextProperty $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }

    /**
     * @return BoundingPoly
     */
    public function getBoundingBox()
    {
        return $this->boundingBox;
    }

    /**
     * @param BoundingPoly $boundingBox
     */
    public function setBoundingBox($boundingBox)
    {
        $this->boundingBox = $boundingBox;
    }

    /**
     * @return Symbol[]
     */
    public function getSymbols()
    {
        return $this->symbols;
    }

    /**
     * @param Symbol[] $symbols
     */
    public function setSymbols($symbols)
    {
        $this->symbols = $symbols;
    }
}
