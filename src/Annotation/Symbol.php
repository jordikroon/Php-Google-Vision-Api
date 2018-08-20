<?php

namespace Vision\Annotation;

class Symbol
{
    /**
     * @var TextProperty|null
     */
    protected $property;

    /**
     * @var BoundingPoly|null
     */
    protected $boundingBox;

    /**
     * @var string|null
     */
    protected $text;

    /**
     * @param TextProperty|null $property
     * @param BoundingPoly|null $boundingBox
     * @param string $text
     */
    public function __construct(TextProperty $property = null, BoundingPoly $boundingBox = null, $text = null)
    {
        $this->property = $property;
        $this->boundingBox = $boundingBox;
        $this->text = $text;
    }

    /**
     * @return TextProperty|null
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param TextProperty|null $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }

    /**
     * @return BoundingPoly|null
     */
    public function getBoundingBox()
    {
        return $this->boundingBox;
    }

    /**
     * @param BoundingPoly|null $boundingBox
     */
    public function setBoundingBox($boundingBox)
    {
        $this->boundingBox = $boundingBox;
    }

    /**
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
