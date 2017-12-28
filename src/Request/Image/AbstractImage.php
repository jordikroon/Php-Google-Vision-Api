<?php

namespace Vision\Request\Image;

abstract class AbstractImage implements ImageInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    abstract public function getType();
}
