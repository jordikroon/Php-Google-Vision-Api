<?php

namespace Vision\Request\Image;

use Vision\Exception\ImageException;

class LocalImage extends Base64Image implements ImageInterface
{
    /**
     * @param null|string $path
     */
    public function __construct($path = null)
    {
        if ($path) {
            $this->setImageFromPath($path);
        }
    }

    /**
     * @param string $path
     */
    public function setImageFromPath($path)
    {
        $imageData = @file_get_contents($path);
        if (!$imageData) {
            throw new ImageException('Could not load the given image');
        }

        $this->value = base64_encode($imageData);
    }
}
