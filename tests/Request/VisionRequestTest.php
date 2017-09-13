<?php

namespace Vision\Tests\Hydrator\Strategy;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Vision\Image;
use Vision\Request\VisionRequest;
use Vision\Response\AnnotateImageResponse;

class VisionRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Image
     */
    protected $image;

    public function setUp()
    {
        parent::setUp();

        $this->image = new Image();
        $this->image->setImage('dGVzdA==');

        $this->features = [
            new \Vision\Feature(\Vision\Feature::LANDMARK_DETECTION, 1),
            new \Vision\Feature(\Vision\Feature::LABEL_DETECTION, 1),
        ];
    }

	public function testPermissionsInjectedInPayload()
	{
        $request = $this->getVisionRequest();

        $class = new \ReflectionClass($request);
        $method = $class->getMethod('getPayload');
        $method->setAccessible(true);
        $payload = $method->invokeArgs($request, []);

        $this->assertEquals($this->getPermissionTestPayload(), $payload);
    }

    public function testReturnsClientException()
    {
        $request = $this->getVisionRequest();

        $class = new \ReflectionClass($request);
        $property = $class->getProperty('clientException');
        $property->setAccessible(true);
        $property->setValue(
            $request,
            new ClientException('exception message',
                new Request('GET', '/'),
                new Response(200,[],json_encode(["error" => ["code" => "test"]]))
            )
        );

        $this->assertEquals($request->getAnnotateImageResponse()->getError()->getCode(), 'test');
    }

    public function testReturnsAnnotateImageResponse()
    {
        $request = $this->getVisionRequest();

        $class = new \ReflectionClass($request);
        $property = $class->getProperty('rawResponse');
        $property->setAccessible(true);
        $property->setValue($request, json_encode(["responses" => [[]]]));

        $this->assertTrue(get_class($request->getAnnotateImageResponse()) === AnnotateImageResponse::class);
    }

    public function testReturnsRawJson()
    {
        $json = '{"some_json":{}}';

        $request = $this->getVisionRequest();
        $class = new \ReflectionClass($request);
        $property = $class->getProperty('rawResponse');
        $property->setAccessible(true);
        $property->setValue($request, $json);

        $this->assertEquals($request->getRawResponse(), $json);
    }


    /**
     * @return VisionRequest
     */
    protected function getVisionRequest()
    {
        return new VisionRequest('abc-123', $this->image, $this->features);
    }

    /**
     * @return array
     */
    protected function getPermissionTestPayload()
    {
        return [
            'requests' => [
                [
                    'image' => [
                        'content' => 'dGVzdA==',
                    ],
                    'features' => [
                        [
                            'type' => 'LANDMARK_DETECTION',
                            'maxResults' => 1
                        ],
                        [
                            'type' => 'LABEL_DETECTION',
                            'maxResults' => 1
                        ]
                    ],
                ],
            ],
        ];
    }
}
