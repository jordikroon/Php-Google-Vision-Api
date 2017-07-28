<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Paragraph;
use Vision\Annotation\Symbol;
use Vision\Annotation\Word;
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
            return array_filter([
                'property' => $this->textPropertyStrategy->extract($symbolEntity->getProperty()),
                'boundingBox' => $this->boundingPolyStrategy->extract($symbolEntity->getBoundingBox()),
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
            $symbolEntities[] = new Symbol(
                $this->textPropertyStrategy->hydrate($symbolEntityInfo['property']),
                $this->boundingPolyStrategy->hydrate($symbolEntityInfo['boundingBox']),
                $symbolEntityInfo['text']
            );
        }

        return $symbolEntities;
    }
}
