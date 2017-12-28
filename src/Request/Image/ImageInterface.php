<?php

namespace Vision\Request\Image;

interface ImageInterface
{
    /**
     * @return string
     */
    public function getValue();

    /**
     * @return string
     */
    public function getType();
}
