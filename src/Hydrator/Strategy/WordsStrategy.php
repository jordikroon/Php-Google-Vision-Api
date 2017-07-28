<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Paragraph;
use Vision\Annotation\Word;
use Zend\Hydrator\Strategy\StrategyInterface;

class WordsStrategy implements StrategyInterface
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
     * @var SymbolsStrategy
     */
    protected $symbolsStrategy;

    public function __construct()
    {
        $this->textPropertyStrategy = new TextPropertyStrategy;
        $this->boundingPolyStrategy = new BoundingPolyStrategy;
        $this->symbolsStrategy = new SymbolsStrategy;
    }

    /**
     * @param Word[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Word $wordEntity) {
            return array_filter([
                'property' => $this->textPropertyStrategy->extract($wordEntity->getProperty()),
                'boundingBox' => $this->boundingPolyStrategy->extract($wordEntity->getBoundingBox()),
                'symbols' => $this->symbolsStrategy->extract($wordEntity->getSymbols()),
            ]);
        }, $value);
    }

    /**
     * @param array $value
     * @return Word[]
     */
    public function hydrate($value)
    {
        $wordEntities = [];

        foreach ($value as $wordEntityInfo) {
            $wordEntities[] = new Word(
                $this->textPropertyStrategy->hydrate($wordEntityInfo['property']),
                $this->boundingPolyStrategy->hydrate($wordEntityInfo['boundingBox']),
                $this->symbolsStrategy->hydrate($wordEntityInfo['symbols'])
            );
        }

        return $wordEntities;
    }
}
