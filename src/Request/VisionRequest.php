<?php

namespace Vision\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Vision\Annotation\ImageContext;
use Vision\Feature;
use Vision\Hydrator\AnnotationHydrator;
use Vision\Image;
use Vision\Hydrator\AnnotateImageHydrator;
use Vision\Response\AnnotateImageResponse;

class VisionRequest
{
    const VISION_ANNOTATE_PREFIX = 'https://vision.googleapis.com/v1/images:annotate?key=';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var Feature[]
     */
    protected $features = [];

    /**
     * @var Image
     */
    protected $image;

    /**
     * @var string
     */
    protected $rawResponse;

    /**
     * @var ClientException
     */
    protected $clientException;

    /**
     * @var ImageContext
     */
    protected $imageContext;

    /**
     * @param string $apiKey
     * @param Image $image
     * @param Feature[] $features
     * @param ImageContext $imageContext
     */
    public function __construct($apiKey, Image $image, array $features, ImageContext $imageContext = null)
    {
        $this->apiKey = $apiKey;
        $this->features = $features;
        $this->image = $image;
        $this->imageContext = $imageContext ?: new ImageContext;
    }


    public function send()
    {
        try {
            $client = new Client;
            $response = $client->post(
                self::VISION_ANNOTATE_PREFIX.$this->apiKey,
                [
                    'content-type' => 'application/json',
                    'body' => json_encode($this->getPayload()),
                ]
            );

            $this->rawResponse = $response->getBody()->getContents();
        } catch (ClientException $e) {
            $this->clientException = $e;
        }
    }

    /**
     * @return AnnotateImageResponse
     */
    public function getAnnotateImageResponse()
    {
        if ($this->clientException) {
            return $this->getResponseFromException($this->clientException);
        }

        $content = json_decode($this->rawResponse, true);
        return $this->getResponseFromArray($content['responses'][0]);
    }

    /**
     * @return string
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * @return array
     */
    protected function getPayload()
    {
        return [
            'requests' => [
                [
                    'image' => [
                        'content' => $this->image->getImage(),
                    ],
                    'features' => $this->getMappedFeatures(),
                    'imageContext' => $this->extractImageContext()
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    protected function getMappedFeatures()
    {
        return array_map(
            function (Feature $feature) {
                return [
                    'type' => $feature->getFeature(),
                    'maxResults' => $feature->getMaxResults(),
                ];
            },
            $this->features
        );
    }

    protected function extractImageContext()
    {
        return (new AnnotationHydrator)->extract($this->imageContext);
    }

    /**
     * @param array $response
     * @return AnnotateImageResponse|object
     */
    protected function getResponseFromArray(array $response)
    {
        return (new AnnotateImageHydrator)->hydrate($response, new AnnotateImageResponse);
    }

    /**
     * @param ClientException $exception
     * @return AnnotateImageResponse
     */
    protected function getResponseFromException(ClientException $exception)
    {
        $response = json_decode($exception->getResponse()->getBody()->getContents(), true);
        return $this->getResponseFromArray($response);
    }
}
