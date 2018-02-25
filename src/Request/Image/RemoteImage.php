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
     * @return array
     */
    public function getValue()
    {
        return ['imageUri' => $this->value];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'source';
    }
}
