<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Block;
use Zend\Hydrator\Strategy\StrategyInterface;

class BlocksStrategy implements StrategyInterface
{
    /**
     * @var TextPropertyStrategy
     */
    protected $textPropertyStrategy;

    /**
     * @var BoundingPolyStrategy
     */
    protected $boundingPolyStrategy;

    /**
     * @var ParagraphsStrategy
     */
    protected $paragraphsStrategy;

    public function __construct()
    {
        $this->textPropertyStrategy = new TextPropertyStrategy;
        $this->boundingPolyStrategy = new BoundingPolyStrategy;
        $this->paragraphsStrategy = new ParagraphsStrategy;
    }

    /**
     * @param Block[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Block $blockEntity) {
            return array_filter([
                'property' => $this->textPropertyStrategy->extract($blockEntity->getProperty()),
                'boundingBox' => $this->boundingPolyStrategy->extract($blockEntity->getBoundingBox()),
                'paragraphs' => $this->paragraphsStrategy->extract($blockEntity->getParagraphs()),
                'blockType' => $blockEntity->getBlockType(),
            ]);
        }, $value);
    }

    /**
     * @param array $value
     * @return Block[]
     */
    public function hydrate($value)
    {
        $blockEntities = [];

        foreach ($value as $blockEntityInfo) {
            $blockEntities[] = new Block(
                $this->textPropertyStrategy->hydrate($blockEntityInfo['property']),
                $this->boundingPolyStrategy->hydrate($blockEntityInfo['boundingBox']),
                $this->paragraphsStrategy->hydrate($blockEntityInfo['paragraphs']),
                $blockEntityInfo['blockType']
            );
        }

        return $blockEntities;
    }
}
