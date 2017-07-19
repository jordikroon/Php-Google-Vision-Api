<?php

namespace Vision\Hydrator;

use Zend\Hydrator\AbstractHydrator;
use Zend\Hydrator\HydratorInterface;

class SubAnnotationHydrator extends AbstractHydrator implements HydratorInterface
{
    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        $hydrator = new AnnotationHydrator();
        return $hydrator->extract($object);
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object[]
     */
    public function hydrate(array $data, $object)
    {
        $array = [];
        $hydrator = new AnnotationHydrator();

        foreach ($data as $value) {
            $clonedObject = clone $object;
            $array[] = $hydrator->hydrate($value, $clonedObject);
        }

        return $array;
    }
}
