<?php

namespace Vision;

use Vision\Request\VisionRequest;
use Vision\Response\AnnotateImageResponse;

class Vision
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var array
     */
    protected $features = [];

    /**
     * @param string $apiKey
     * @param Feature[] $features
     */
    public function __construct($apiKey, array $features = [])
    {
        $this->apiKey = $apiKey;
        $this->setFeatures($features);
    }

    /**
     * @param Image $image
     * @return AnnotateImageResponse
     */
    public function getRequest(Image $image)
    {
        $request = new VisionRequest(
            $this->apiKey,
            $image,
            $this->features
        );

        return $request->send();
    }

    /**
     * @return Feature[]
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param Feature[] $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @param Feature $feature
     */
    public function addFeature($feature)
    {
        $this->features[] = $feature;
    }
}
