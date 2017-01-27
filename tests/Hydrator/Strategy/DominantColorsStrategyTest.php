<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\Color;
use Vision\Annotation\DominantColor;
use Vision\Hydrator\Strategy\DominantColorsStrategy;

class DominantColorsStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new DominantColorsStrategy();
        $objects = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $objects);
    }

    public function testExtractsObject()
    {
        $strategy = new DominantColorsStrategy();
        $array = $strategy->extract($this->getObjects());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'colors' => [
                [
                    'color' => [
                        'red' => 12,
                        'green' => 34,
                        'blue' => 56,
                    ],
                    'score' => 78,
                    'pixelFraction' => 90,
                ],
                [
                    'color' => [
                        'red' => 9,
                        'green' => 98,
                        'blue' => 76,
                    ],
                    'score' => 54,
                    'pixelFraction' => 32,
                ],
            ]
        ];
    }

    /**
     * @return DominantColor[]
     */
    protected function getObjects()
    {
        $objectA = new DominantColor;
        $objectA->setColor(new Color(12, 34, 56));
        $objectA->setScore(78);
        $objectA->setPixelFraction(90);

        $objectB = new DominantColor;
        $objectB->setColor(new Color(9, 98, 76));
        $objectB->setScore(54);
        $objectB->setPixelFraction(32);

        return [$objectA, $objectB];
    }
}
