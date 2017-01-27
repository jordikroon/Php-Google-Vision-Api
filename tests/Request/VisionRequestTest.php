<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Image;
use Vision\Request\VisionRequest;

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
    }

    public function testPermissionsInjectedInPayload()
    {
        $features = [
            new \Vision\Feature(\Vision\Feature::LANDMARK_DETECTION, 1),
            new \Vision\Feature(\Vision\Feature::LABEL_DETECTION, 1),
        ];

        $request = new VisionRequest('abc-123', $this->image, $features);

        $class = new \ReflectionClass($request);
        $method = $class->getMethod('getPayload');
        $method->setAccessible(true);
        $payload = $method->invokeArgs($request, []);

        $this->assertEquals($this->getPermissionTestPayload(), $payload);
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
