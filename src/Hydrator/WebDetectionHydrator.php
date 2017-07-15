<?php

namespace Vision\Hydrator;

use Zend\Hydrator\ClassMethods;

class WebDetectionHydrator extends ClassMethods
{
    public function __construct()
    {
        parent::__construct(false);

        $this->addStrategy('webEntities', new Strategy\WebEntitiesStrategy());
        $this->addStrategy('fullMatchingImages', new Strategy\WebImagesStrategy());
        $this->addStrategy('partialMatchingImages', new Strategy\WebImagesStrategy());
        $this->addStrategy('pagesWithMatchingImages', new Strategy\WebPagesStrategy());
        $this->addStrategy('visuallySimilarImages', new Strategy\WebImagesStrategy());
    }
}
