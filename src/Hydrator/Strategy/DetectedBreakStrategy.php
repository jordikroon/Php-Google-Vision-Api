<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\DetectedBreak;
use Zend\Hydrator\Strategy\StrategyInterface;

class DetectedBreakStrategy implements StrategyInterface
{
    /**
     * @param DetectedBreak $value
     * @return array
     */
    public function extract($value)
    {
        return array_filter([
            'type' => $value->getType(),
            'isPrefix' => $value->isPrefix(),
        ]);
    }

    /**
     * @param array $value
     * @return DetectedBreak
     */
    public function hydrate($value)
    {
        return new DetectedBreak($value['type'], isset($value['isPrefix']) ? $value['isPrefix'] : false);
    }
}
