<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\WebImage;
use Vision\Hydrator\Strategy\WebImagesStrategy;

class WebImagesStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new WebImagesStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new WebImagesStrategy();
        $array = $strategy->extract($this->getObjects());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            [
                'url' => 'https://i2.wp.com/thetradingtravelers.com/wp-content/uploads/2014/07/eiffel-tower-day.jpg?fit=400%2C600',
            ],
            [
                'url' => 'https://hh2983bckk73apigx3cu5b3t23-wpengine.netdna-ssl.com/wp-content/uploads/2015/10/Eiffel-Tower-1.jpg',
                'score' => 0.12345
            ]
        ];
    }

    /**
     * @return WebImage[]
     */
    protected function getObjects()
    {
        return [
            new WebImage('https://i2.wp.com/thetradingtravelers.com/wp-content/uploads/2014/07/eiffel-tower-day.jpg?fit=400%2C600'),
            new WebImage('https://hh2983bckk73apigx3cu5b3t23-wpengine.netdna-ssl.com/wp-content/uploads/2015/10/Eiffel-Tower-1.jpg', 0.12345)
        ];
    }
}
