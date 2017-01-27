<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\Property;
use Vision\Hydrator\Strategy\PropertyStrategy;

class PropertyStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new PropertyStrategy();
        $objects = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $objects);
    }

    public function testExtractsObject()
    {
        $strategy = new PropertyStrategy();
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
                'name' => 'foo',
                'value' => 'bar'
            ],
            [
                'name' => 'hello',
                'value' => 'world'
            ]
        ];
    }

    /**
     * @return Property[]
     */
    protected function getObjects()
    {
        return [
            new Property('foo', 'bar'),
            new Property('hello', 'world')
        ];
    }
}
