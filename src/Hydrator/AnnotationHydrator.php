<?php

namespace Vision\Hydrator;

use Zend\Hydrator\ClassMethods;

class AnnotationHydrator extends ClassMethods
{
    public function __construct()
    {
        parent::__construct(false);

        $this->addStrategy('boundingPoly', new Strategy\BoundingPolyStrategy);
        $this->addStrategy('fdBoundingPoly', new Strategy\BoundingPolyStrategy);
        $this->addStrategy('dominantColors', new Strategy\DominantColorsStrategy());
        $this->addStrategy('landmarks', new Strategy\LandmarkStrategy());
        $this->addStrategy('properties', new Strategy\PropertyStrategy());
        $this->addStrategy('locations', new Strategy\LocationStrategy());
        $this->addStrategy('webEntities', new Strategy\WebEntitiesStrategy());
        $this->addStrategy('cropHints', new Strategy\CropHintStrategy());
        $this->addStrategy('latLongRect', new Strategy\LatLongRectStrategy());
        $this->addStrategy('cropHintsParams', new Strategy\CropHintsParamsStrategy());
    }
}
