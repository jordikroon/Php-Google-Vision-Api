<?php

namespace Vision\Annotation;

class Page
{
    /**
     * @var TextProperty
     */
    protected $property;

    /**
     * @var integer
     */
    protected $width;

    /**
     * @var integer
     */
    protected $height;

    /**
     * @var Block[]
     */
    protected $blocks = [];

    /**
     * @param TextProperty $property
     * @param int $width
     * @param int $height
     * @param Block[] $blocks
     */
    public function __construct(TextProperty $property, $width, $height, array $blocks)
    {
        $this->property = $property;
        $this->width = $width;
        $this->height = $height;
        $this->blocks = $blocks;
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
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return Block[]
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @param Block[] $blocks
     */
    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;
    }
}
