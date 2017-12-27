<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\CropHintsParams;
use Vision\Hydrator\Strategy\CropHintsParamsStrategy;

class CropHintsParamsStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new CropHintsParamsStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new CropHintsParamsStrategy();
        $array = $strategy->extract($this->getObjects());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'aspectRatios' => [1.21, 0.78]
        ];
    }

    /**
     * @return CropHintsParams
     */
    protected function getObjects()
    {
        return new CropHintsParams([1.21, 0.78]);
    }
}
