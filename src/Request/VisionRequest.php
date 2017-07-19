<?php

namespace Vision\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Vision\Feature;
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
     * @param string $apiKey
     * @param Image $image
     * @param Feature[] $features
     */
    public function __construct($apiKey, Image $image, array $features)
    {
        $this->apiKey = $apiKey;
        $this->features = $features;
        $this->image = $image;
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

    /**
     * @return AnnotateImageResponse
     */
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

            $content = json_decode($response->getBody()->getContents(), true);
            $response = $content['responses'][0];
            
            return $this->getResponseFromArray($response);
        } catch (ClientException $e) {
            return $this->getResponseFromException($e);
        }
    }

    /**
     * @param array $response
     * @return AnnotateImageResponse
     */
    protected function getResponseFromArray(array $response)
    {
        $hydrator = new AnnotateImageHydrator();
        return $hydrator->hydrate($response, new AnnotateImageResponse);
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
