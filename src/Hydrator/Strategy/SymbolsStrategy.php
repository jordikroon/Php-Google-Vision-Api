<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Symbol;
use Zend\Hydrator\Strategy\StrategyInterface;

class SymbolsStrategy implements StrategyInterface
{
    /**
     * @var TextPropertyStrategy
     */
    protected $textPropertyStrategy;

    /**
     * @var BoundingPolyStrategy
     */
    protected $boundingPolyStrategy;

    public function __construct()
    {
        $this->textPropertyStrategy = new TextPropertyStrategy;
        $this->boundingPolyStrategy = new BoundingPolyStrategy;
    }

    /**
     * @param Symbol[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Symbol $symbolEntity) {
            $textProperty = $symbolEntity->getProperty()
                ? $this->textPropertyStrategy->extract($symbolEntity->getProperty())
                : null;

            $boundingBox = $symbolEntity->getBoundingBox()
                ? $this->boundingPolyStrategy->extract($symbolEntity->getBoundingBox())
                : null;

            return array_filter([
                'property' => $textProperty,
                'boundingBox' => $boundingBox,
                'text' => $symbolEntity->getText(),
            ]);
        }, $value);
    }

    /**
     * @param array $value
     * @return Symbol[]
     */
    public function hydrate($value)
    {
        $symbolEntities = [];

        foreach ($value as $symbolEntityInfo) {
            $textProperty = isset($symbolEntityInfo['property'])
                ? $this->textPropertyStrategy->hydrate($symbolEntityInfo['property'])
                : null;

            $boundingBox = isset($symbolEntityInfo['boundingBox'])
                ? $this->boundingPolyStrategy->hydrate($symbolEntityInfo['boundingBox'])
                : null;

            $symbolEntities[] = new Symbol(
                $textProperty,
                $boundingBox,
                isset($symbolEntityInfo['text']) ? $symbolEntityInfo['text'] : null
            );
        }

        return $symbolEntities;
    }
}
