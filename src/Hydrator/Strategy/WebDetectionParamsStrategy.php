<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\CropHintsParams;
use Vision\Annotation\WebDetectionParams;
use Zend\Hydrator\Strategy\StrategyInterface;

class WebDetectionParamsStrategy implements StrategyInterface
{
    /**
     * @param WebDetectionParams $value
     * @return array|null
     */
    public function extract($value)
    {
        return $value ? ['includeGeoResults' => !!$value->isIncludeGeoResults()] : null;
    }

    /**
     * @param array $value
     * @return WebDetectionParams|null
     */
    public function hydrate($value)
    {
        return $value ? new WebDetectionParams(!!$value['includeGeoResults']) : null;
    }
}
