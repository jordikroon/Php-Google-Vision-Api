<?php

namespace Vision\Request\Image;

class RemoteImage extends AbstractImage implements ImageInterface
{
    /**
     * @param string $remoteUrl
     */
    public function __construct($remoteUrl)
    {
        $this->value = $remoteUrl;
    }

    /**
     * @param string $remoteUrl
     */
    public function setRemoteUrl($remoteUrl)
    {
        $this->value = $remoteUrl;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'imageUri';
    }
}
