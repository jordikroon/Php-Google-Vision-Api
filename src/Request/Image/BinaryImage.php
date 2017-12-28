<?php

namespace Vision\Request\Image;

class BinaryImage extends AbstractImage implements ImageInterface
{
    /**
     * @param null|string $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = base64_encode($value);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'content';
    }
}
