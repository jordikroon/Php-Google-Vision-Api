<?php

namespace Vision;

use Vision\Exception\ImageException;

class Image
{
    /**
     * @var string
     */
    protected $image;

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

        $this->image = base64_encode($imageData);
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        if (base64_encode(base64_decode($image, true)) !== $image){
            throw new ImageException('The given image is not in a valid Base64 string');
        }

        $this->image = $image;
    }
}
