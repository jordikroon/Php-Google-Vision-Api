<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\CropHintsParams;
use Zend\Hydrator\Strategy\StrategyInterface;

class CropHintsParamsStrategy implements StrategyInterface
{
    /**
     * @param CropHintsParams $value
     * @return array|null
     */
    public function extract($value)
    {
        return $value ? ['aspectRatios' => $value->getAspectRatios()] : null;
    }

    /**
     * @param array $value
     * @return CropHintsParams|null
     */
    public function hydrate($value)
    {
        return $value ? new CropHintsParams($value['aspectRatios']) : null;
    }
}
