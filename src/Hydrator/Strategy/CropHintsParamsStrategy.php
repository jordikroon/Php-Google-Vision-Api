<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\CropHintsParams;
use Zend\Hydrator\Strategy\StrategyInterface;

class CropHintsParamsStrategy implements StrategyInterface
{
    /**
     * @param CropHintsParams $value
     * @return array
     */
    public function extract($value)
    {
        return ['aspectRatio' => $value->getAspectRatios()];
    }

    /**
     * @param array $value
     * @return CropHintsParams
     */
    public function hydrate($value)
    {
        return new CropHintsParams($value);
    }
}
