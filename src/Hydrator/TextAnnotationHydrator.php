<?php

namespace Vision\Hydrator;

use Zend\Hydrator\ClassMethods;

class TextAnnotationHydrator extends ClassMethods
{
    public function __construct()
    {
        parent::__construct(false);

        $this->addStrategy('pages', new Strategy\PagesStrategy());
    }
}
