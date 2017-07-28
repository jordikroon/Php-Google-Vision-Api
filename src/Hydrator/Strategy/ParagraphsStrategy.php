<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Paragraph;
use Zend\Hydrator\Strategy\StrategyInterface;

class ParagraphsStrategy implements StrategyInterface
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
     * @var WordsStrategy
     */
    protected $wordsStrategy;

    public function __construct()
    {
        $this->textPropertyStrategy = new TextPropertyStrategy;
        $this->boundingPolyStrategy = new BoundingPolyStrategy;
        $this->wordsStrategy = new WordsStrategy;
    }

    /**
     * @param Paragraph[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Paragraph $paragraphEntity) {
            return array_filter([
                'property' => $this->textPropertyStrategy->extract($paragraphEntity->getProperty()),
                'boundingBox' => $this->boundingPolyStrategy->extract($paragraphEntity->getBoundingBox()),
                'words' => $this->wordsStrategy->extract($paragraphEntity->getWords()),
            ]);
        }, $value);
    }

    /**
     * @param array $value
     * @return Paragraph[]
     */
    public function hydrate($value)
    {
        $paragraphEntities = [];

        foreach ($value as $paragraphEntityInfo) {
            $paragraphEntities[] = new Paragraph(
                $this->textPropertyStrategy->hydrate($paragraphEntityInfo['property']),
                $this->boundingPolyStrategy->hydrate($paragraphEntityInfo['boundingBox']),
                $this->wordsStrategy->hydrate($paragraphEntityInfo['words'])
            );
        }

        return $paragraphEntities;
    }
}
