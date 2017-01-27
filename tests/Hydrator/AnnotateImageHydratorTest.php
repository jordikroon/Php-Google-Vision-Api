<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\BoundingPoly;
use Vision\Annotation\EntityAnnotation;
use Vision\Annotation\SafeSearchAnnotation;
use Vision\Annotation\Vertex;
use Vision\Hydrator\AnnotateImageHydrator;
use Vision\Response\AnnotateImageResponse;

class AnnotateImageHydratorTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new AnnotateImageHydrator();
        $object = $strategy->hydrate($this->getArray(), new AnnotateImageResponse);

        $this->assertEquals($this->getObject(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new AnnotateImageHydrator();
        $array = $strategy->extract($this->getObject());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return AnnotateImageResponse
     */
    protected function getObject()
    {
        $boundingPoly = new BoundingPoly;
        $boundingPoly->addVertex(new Vertex(129, 203));
        $boundingPoly->addVertex(new Vertex(458, 203));

        $entityAnnotation = new EntityAnnotation;
        $entityAnnotation->setMid('/m/0b34hf');
        $entityAnnotation->setDescription('Google');
        $entityAnnotation->setScore(0.31551266);
        $entityAnnotation->setBoundingPoly($boundingPoly);

        $safeSearchAnnotation = new SafeSearchAnnotation;
        $safeSearchAnnotation->setAdult('VERY_UNLIKELY');
        $safeSearchAnnotation->setSpoof('VERY_UNLIKELY');
        $safeSearchAnnotation->setMedical('LIKELY');
        $safeSearchAnnotation->setViolence('UNLIKELY');

        $annotateImageResponse = new AnnotateImageResponse;
        $annotateImageResponse->setLogoAnnotations([$entityAnnotation]);
        $annotateImageResponse->setSafeSearchAnnotation($safeSearchAnnotation);

        return $annotateImageResponse;
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            'logoAnnotations' => [
                [
                    'mid' => '/m/0b34hf',
                    'description' => 'Google',
                    'score' => 0.31551266,
                    'boundingPoly' => [
                        'vertices' => [
                            [
                                'x' => 129,
                                'y' => 203,
                            ],
                            [
                                'x' => 458,
                                'y' => 203,
                            ],
                        ],
                    ],
                    'properties' => [],
                    'locations' => []
                ],
            ],
            'safeSearchAnnotation' => [
                'adult' => 'VERY_UNLIKELY',
                'spoof' => 'VERY_UNLIKELY',
                'medical' => 'LIKELY',
                'violence' => 'UNLIKELY',
            ],
        ];
    }
}
