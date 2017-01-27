<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\LatLng;
use Vision\Annotation\Location;
use Vision\Hydrator\Strategy\LocationStrategy;

class LocationStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new LocationStrategy();
        $objects = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $objects);
    }

    public function testExtractsObject()
    {
        $strategy = new LocationStrategy();
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
                'latLng' => [
                    'latitude' => 12.34,
                    'longitude' => 56.78,
                ]
            ],
            [
                'latLng' => [
                    'latitude' => 11.22,
                    'longitude' => 33.44,
                ]
            ],
        ];
    }

    /**
     * @return Location[]
     */
    protected function getObjects()
    {
        return [
            new Location(new LatLng(12.34, 56.78)),
            new Location(new LatLng(11.22, 33.44))
        ];
    }
}
