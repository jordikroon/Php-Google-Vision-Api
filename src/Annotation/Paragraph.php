<?php

namespace Vision\Annotation;

class Paragraph
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
     * @var Word[]
     */
    protected $words = [];

    /**
     * @param TextProperty $property
     * @param BoundingPoly $boundingBox
     * @param Word[] $words
     */
    public function __construct(TextProperty $property, BoundingPoly $boundingBox, array $words)
    {
        $this->property = $property;
        $this->boundingBox = $boundingBox;
        $this->words = $words;
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
     * @return Word[]
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * @param Word[] $words
     */
    public function setWords($words)
    {
        $this->words = $words;
    }
}
