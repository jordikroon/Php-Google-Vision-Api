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
             $textProperty = $wordEntity->getProperty()
                 ? $this->textPropertyStrategy->extract($wordEntity->getProperty())
                 : null;

             $boundingBox = $wordEntity->getBoundingBox()
                 ? $this->boundingPolyStrategy->extract($wordEntity->getBoundingBox())
                 : null;
            
             $symbols = $wordEntity->getSymbols()
                 ? $this->symbolsStrategy->extract($wordEntity->getSymbols())
                 : null;
            
            return array_filter([
                'property' => $textProperty,
                'boundingBox' => $boundingBox,
                'symbols' => $symbols,
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
            $textProperty = isset($wordEntityInfo['property'])
                ? $this->textPropertyStrategy->hydrate($wordEntityInfo['property'])
                : null;
            
            $boundingBox = isset($wordEntityInfo['boundingBox'])
                 ? $this->boundingPolyStrategy->hydrate($wordEntityInfo['boundingBox'])
                 : null;
            
            $symbols = isset($wordEntityInfo['symbols'])
                 ? $this->symbolsStrategy->hydrate($wordEntityInfo['symbols'])
                 : null;
            
            $wordEntities[] = new Word(
                $textProperty,
                $boundingBox,
                $symbols
            );
        }

        return $wordEntities;
    }
}
