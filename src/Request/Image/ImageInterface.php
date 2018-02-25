<?php

namespace Vision\Request\Image;

interface ImageInterface
{
    /**
     * @return string|array
     */
    public function getValue();

    /**
     * @return string
     */
    public function getType();
}
