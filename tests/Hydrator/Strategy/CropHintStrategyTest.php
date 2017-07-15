<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\BoundingPoly;
use Vision\Annotation\CropHint;
use Vision\Annotation\Vertex;
use Vision\Hydrator\Strategy\CropHintStrategy;

class CropHintStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new CropHintStrategy();
        $objects = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $objects);
    }

    public function testExtractsObject()
    {
        $strategy = new CropHintStrategy();
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
                'boundingPoly' => [
                    'vertices' => [
                        [],
                        ['x' => 1100],
                        ['x' => 1100, 'y' => 1467],
                        ['y' => 1467]
                    ],
                ],
                'confidence' => 0.79999995,
                'importanceFraction' => 1
            ]
        ];
    }

    /**
     * @return CropHint[]
     */
    protected function getObjects()
    {
        $boundingPoly = new BoundingPoly();
        $boundingPoly->addVertex(new Vertex());
        $boundingPoly->addVertex(new Vertex(1100));
        $boundingPoly->addVertex(new Vertex(1100, 1467));
        $boundingPoly->addVertex(new Vertex(null, 1467));

        return [
            new CropHint($boundingPoly, 0.79999995, 1),
        ];
    }
}
