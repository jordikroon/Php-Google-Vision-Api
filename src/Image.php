<?php

namespace Vision;

use Vision\Exception\ImageException;
use Vision\Request\Image\Base64Image;
use Vision\Request\Image\ImageInterface;

/**
 * @deprecated
 *
 * Alternatives classes are
 * - Vision\Request\Image\LocalImage
 * - Vision\Request\Image\Base64Image
 */
class Image extends Base64Image implements ImageInterface
{
    /**
     * @var string
     */
    protected $image;

    /**
     * @param string|null $path
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
        $this->value = $this->image = base64_encode($imageData);
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
        parent::setValue($image);

        $this->image = $this->value;
    }
}
