<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\CropHintsParams;
use Vision\Annotation\WebDetectionParams;
use Vision\Hydrator\Strategy\CropHintsParamsStrategy;
use Vision\Hydrator\Strategy\WebDetectionParamsStrategy;

class WebDetectionParamsStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new WebDetectionParamsStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new WebDetectionParamsStrategy();
        $array = $strategy->extract($this->getObjects());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'includeGeoResults' => true
        ];
    }

    /**
     * @return WebDetectionParams
     */
    protected function getObjects()
    {
        return new WebDetectionParams(true);
    }
}
