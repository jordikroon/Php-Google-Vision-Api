<?php

namespace Vision;

use Vision\Request\VisionRequest;
use Vision\Response\AnnotateImageResponse;

class Vision
{
	const RESPONSE_TYPE_JSON = 'JSON';
	const RESPONSE_TYPE_OBJECT = 'OBJECT';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var array
     */
    protected $features = [];

    /**
     * @var VisionRequest
     */
    protected $visionRequest;

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
     * @param string $responseType
     * @return mixed
     */
    public function request(Image $image, $responseType = self::RESPONSE_TYPE_OBJECT)
    {
        $this->visionRequest = new VisionRequest($this->apiKey, $image, $this->features);
        $this->visionRequest->send();

        return $this->getResponseType($responseType);
    }

    /**
     * @param string $responseType
     * @return mixed|AnnotateImageResponse
     */
    public function getResponseType($responseType)
    {
        return $responseType === self::RESPONSE_TYPE_JSON ?
            $this->visionRequest->getRawResponse() :
            $this->visionRequest->getAnnotateImageResponse();
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

    /**
     * @deprecated
     *
     * @param Image $image
     * @return AnnotateImageResponse
     */
    public function getRequest(Image $image)
    {
        return $this->request($image);
    }
}
