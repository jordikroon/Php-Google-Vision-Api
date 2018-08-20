<?php

namespace Vision\Annotation;

class Paragraph
{
    /**
     * @var TextProperty|null
     */
    protected $property = null;

    /**
     * @var BoundingPoly|null
     */
    protected $boundingBox = null;

    /**
     * @var Word[]
     */
    protected $words = [];

    /**
     * @param TextProperty $property
     * @param BoundingPoly $boundingBox
     * @param Word[] $words
     */
    public function __construct(TextProperty $property = null, BoundingPoly $boundingBox = null, array $words = [])
    {
        $this->property = $property;
        $this->boundingBox = $boundingBox;
        $this->words = $words;
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
