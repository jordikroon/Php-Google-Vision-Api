<?php

namespace Vision\Tests\Hydrator\Strategy;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Vision\Annotation\CropHintsParams;
use Vision\Annotation\ImageContext;
use Vision\Annotation\LatLng;
use Vision\Annotation\LatLongRect;
use Vision\Image;
use Vision\Request\Image\Base64Image;
use Vision\Request\VisionRequest;
use Vision\Response\AnnotateImageResponse;

class VisionRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Image
     */
    protected $image;

    /**
     * @var array
     */
    protected $features = [];

    public function setUp()
    {
        parent::setUp();

        $this->image = new Base64Image();
        $this->image->setValue('dGVzdA==');

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

        $this->assertEquals($this->getTestPayload(), $payload);
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

    public function testHydratesImageContext()
    {
        $request = $this->getVisionRequest();
        $class = new \ReflectionClass($request);
        $method = $class->getMethod('extractImageContext');
        $method->setAccessible(true);

        $payload = $method->invokeArgs($request, []);
        $imageContextTestPayload = $this->getTestPayload()['requests'][0]['imageContext'];

        $this->assertEquals($payload, $imageContextTestPayload);
    }

    /**
     * @return VisionRequest
     */
    protected function getVisionRequest()
    {
        $imageContext = new ImageContext();
        $imageContext->setLanguageHints(['lookbehind']);
        $imageContext->setCropHintsParams(new CropHintsParams([1.27]));
        $imageContext->setLatLongRect(new LatLongRect(
            new LatLng(5.3814712, 51.4455368),
            new LatLng(51.5285582, -0.2416796)
        ));

        return new VisionRequest('abc-123', $this->image, $this->features, $imageContext);
    }

    /**
     * @return array
     */
    protected function getTestPayload()
    {
        return [
            'requests' => [
                [
                    'image' => ['content' => 'dGVzdA=='],
                    'features' => [
                        ['type' => 'LANDMARK_DETECTION', 'maxResults' => 1],
                        ['type' => 'LABEL_DETECTION', 'maxResults' => 1]
                    ],
                    'imageContext' => [
                        'latLongRect' => [
                            'minLatLng' => ['latitude' => 5.3814712, 'longitude' => 51.4455368],
                            'maxLatLng' => ['latitude' => 51.5285582, 'longitude' => -0.2416796]
                        ],
                        'languageHints' => ['lookbehind'],
                        'cropHintsParams' => ['aspectRatios' => [1.27]]
                    ]
                ],
            ],
        ];
    }
}
