<?php

namespace Vision\Annotation;

class Symbol
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
     * @var string
     */
    protected $text;

    /**
     * @param TextProperty $property
     * @param BoundingPoly $boundingBox
     * @param string $text
     */
    public function __construct(TextProperty $property, BoundingPoly $boundingBox, $text)
    {
        $this->property = $property;
        $this->boundingBox = $boundingBox;
        $this->text = $text;
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
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
