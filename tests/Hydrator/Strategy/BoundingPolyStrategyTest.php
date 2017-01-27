<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\BoundingPoly;
use Vision\Annotation\Vertex;
use Vision\Hydrator\Strategy\BoundingPolyStrategy;

class BoundingPolyStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new BoundingPolyStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObject(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new BoundingPolyStrategy();
        $array = $strategy->extract($this->getObject());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'vertices' => [
                [
                    'x' => 12,
                    'y' => 6
                ],
                [
                    'x' => 4,
                    'y' => 3
                ]
            ]
        ];
    }

    /**
     * @return BoundingPoly
     */
    protected function getObject()
    {
        $object = new BoundingPoly;
        $object->addVertex(new Vertex(12, 6));
        $object->addVertex(new Vertex(4, 3));

        return $object;
    }
}
