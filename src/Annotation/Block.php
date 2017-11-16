<?php

namespace Vision\Annotation;

class Block
{
    const TYPE_UNKNOWN = 'UNKNOWN';
    const TYPE_TEXT = 'TEXT';
    const TYPE_TABLE = 'TABLE';
    const TYPE_PICTURE = 'PICTURE';
    const TYPE_RULER = 'RULER';
    const TYPE_BARCODE = 'BARCODE';

    /**
     * @var TextProperty|null
     */
    protected $property;

    /**
     * @var BoundingPoly|null
     */
    protected $boundingBox;

    /**
     * @var Paragraph[]
     */
    protected $paragraphs = [];

    /**
     * @var string
     */
    protected $blockType = self::TYPE_UNKNOWN;

    /**
     * @param TextProperty $property
     * @param BoundingPoly $boundingBox
     * @param Paragraph[] $paragraphs
     * @param string $blockType
     */
    public function __construct(
        TextProperty $property = null,
        BoundingPoly $boundingBox = null,
        array $paragraphs = [],
        $blockType = self::TYPE_UNKNOWN
    ) {
        $this->property = $property;
        $this->boundingBox = $boundingBox;
        $this->paragraphs = $paragraphs;
        $this->blockType = $blockType;
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
     * @return Paragraph[]
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

    /**
     * @param Paragraph[] $paragraphs
     */
    public function setParagraphs($paragraphs)
    {
        $this->paragraphs = $paragraphs;
    }

    /**
     * @return string
     */
    public function getBlockType()
    {
        return $this->blockType;
    }

    /**
     * @param string $blockType
     */
    public function setBlockType($blockType)
    {
        $this->blockType = $blockType;
    }
}
