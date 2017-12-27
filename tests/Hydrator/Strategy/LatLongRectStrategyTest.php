<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\LatLng;
use Vision\Annotation\LatLongRect;
use Vision\Hydrator\Strategy\LatLongRectStrategy;

class LatLongRectStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new LatLongRectStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new LatLongRectStrategy();
        $array = $strategy->extract($this->getObjects());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'minLatLng' => [
                'latitude' => 5.3814712,
                'longitude' => 51.4455368
            ],
            'maxLatLng' => [
                'latitude' => 51.5285582,
                'longitude' => -0.2416796
            ]
        ];
    }

    /**
     * @return LatLongRect
     */
    protected function getObjects()
    {
        return new LatLongRect(
            new LatLng(5.3814712, 51.4455368),
            new LatLng(51.5285582, -0.2416796)
        );
    }
}
