<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\Property;
use Zend\Hydrator\Strategy\StrategyInterface;

class PropertyStrategy implements StrategyInterface
{
    /**
     * @param Property[] $value
     * @return array
     */
    public function extract($value)
    {
        return array_map(function(Property $property) {
            return [
                'name' => $property->getName(),
                'value' => $property->getValue(),
            ];
        }, $value);
    }

    /**
     * @param array $value
     * @return Property[]
     */
    public function hydrate($value)
    {
        $properties = [];

        foreach ($value as $propertyInfo) {
            $properties[] = new Property($propertyInfo['name'], $propertyInfo['value']);
        }

        return $properties;
    }
}
