<?php

namespace Vision\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Vision\Annotation\ImageContext;
use Vision\Feature;
use Vision\Hydrator\AnnotationHydrator;
use Vision\Hydrator\AnnotateImageHydrator;
use Vision\Request\Image\ImageInterface;
use Vision\Response\AnnotateImageResponse;

class VisionRequest
{
    const VISION_VERSION = 'v1';
    const VISION_ANNOTATE_PREFIX = 'https://vision.googleapis.com/' . self::VISION_VERSION . '/images:annotate?key=';

    /**
     * @var string
     */
    protected $version = self::VISION_VERSION;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var Feature[]
     */
    protected $features = [];

    /**
     * @var ImageInterface
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
     * @param ImageInterface $image
     * @param Feature[] $features
     * @param ImageContext $imageContext
     */
    public function __construct($apiKey, ImageInterface $image, array $features, ImageContext $imageContext = null)
    {
        $this->apiKey = $apiKey;
        $this->features = $features;
        $this->image = $image;
        $this->imageContext = $imageContext ?: new ImageContext;
    }

    /**
     * @param Client|null $client
     */
    public function send(Client $client = null)
    {
        $client = $client ?: new Client;

        try {
            $response = $client->post(
                $this->getRequestUrl(),
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
     * @return string
     */
    public function getRequestUrl()
    {
        $visionUrl = self::VISION_ANNOTATE_PREFIX . $this->apiKey;
        return str_replace('/' . self::VISION_VERSION . '/', '/' . $this->getVersion() . '/', $visionUrl);
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
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
                        $this->image->getType() => $this->image->getValue(),
                    ],
                    'features' => $this->getMappedFeatures(),
                    'imageContext' => $this->extractImageContext() ?: null
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
            function(Feature $feature) {
                return [
                    'type' => $feature->getFeature(),
                    'maxResults' => $feature->getMaxResults(),
                ];
            },
            $this->features
        );
    }

    /**
     * @return array
     */
    protected function extractImageContext()
    {
        return array_filter(
            (new AnnotationHydrator)->extract($this->imageContext)
        );
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
