<?php

namespace Vision\Request\Image;

use Vision\Exception\ImageException;

class Base64Image extends AbstractImage implements ImageInterface
{
    /**
     * @param null|string $value
     */
    public function __construct($value = null)
    {
        if ($value) {
            $this->setValue($value);
        }
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        if (base64_encode(base64_decode($value, true)) !== $value){
            throw new ImageException('The given image is not in a valid Base64 string');
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'content';
    }
}
