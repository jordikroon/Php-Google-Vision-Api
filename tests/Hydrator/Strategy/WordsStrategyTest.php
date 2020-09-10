<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\Word;
use Vision\Annotation\BoundingPoly;
use Vision\Annotation\Symbol;
use Vision\Annotation\Vertex;
use Vision\Hydrator\Strategy\WordsStrategy;

class WordTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new WordsStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new WordsStrategy();
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
                "boundingBox" => [
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
                ],
                "symbols" => [ 
                    [
                        "boundingBox" => [
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
                        ],
                        "text" => "M"
                    ]
                ]
            ]
        ];
    }

    /**
     * @return DetectedLanguage[]
     */
    protected function getObjects()
    {
        $boundingPoly = new BoundingPoly;
        $boundingPoly->addVertex(new Vertex(12, 6));
        $boundingPoly->addVertex(new Vertex(4, 3));
        
        $symbol = new Symbol(
            null,
            $boundingPoly,
            "M"
        );

        return [new Word(null, $boundingPoly, [ $symbol ])];
    }
}
