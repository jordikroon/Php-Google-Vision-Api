<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Page;
use Zend\Hydrator\Strategy\StrategyInterface;

class PagesStrategy implements StrategyInterface
{
    /**
     * @var TextPropertyStrategy
     */
    protected $textPropertyStrategy;

    /**
     * @var BlocksStrategy
     */
    protected $blocksStrategy;

    public function __construct()
    {
        $this->textPropertyStrategy = new TextPropertyStrategy;
        $this->blocksStrategy = new BlocksStrategy;
    }

    /**
     * @param Page[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Page $page) {
            return array_filter([
                'property' => $this->textPropertyStrategy->extract($page->getProperty()),
                'width' => $page->getWidth(),
                'height' => $page->getHeight(),
                'blocks' => $this->blocksStrategy->extract($page->getBlocks())
            ]);
        }, $value);
    }

    /**
     * @param array $value
     * @return Page[]
     */
    public function hydrate($value)
    {
        $pageEntities = [];

        foreach ($value as $pageEntityInfo) {
            $pageEntities[] = new Page(
                $this->textPropertyStrategy->hydrate($pageEntityInfo['property']),
                $pageEntityInfo['width'],
                $pageEntityInfo['height'],
                $this->blocksStrategy->hydrate($pageEntityInfo['blocks'])
            );
        }

        return $pageEntities;
    }
}
