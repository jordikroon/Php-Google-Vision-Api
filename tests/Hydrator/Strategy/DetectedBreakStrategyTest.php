<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\DetectedBreak;
use Vision\Hydrator\Strategy\DetectedBreakStrategy;

class DetectedBreakStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new DetectedBreakStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObject(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new DetectedBreakStrategy();
        $array = $strategy->extract($this->getObject());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'type' => 'SPACE',
        ];
    }

    /**
     * @return DetectedBreak
     */
    protected function getObject()
    {
        return new DetectedBreak('SPACE', false);
    }
}
