<?php

namespace Vision\Hydrator\Strategy;

use Vision\Annotation\BoundingPoly;
use Vision\Annotation\Vertex;
use Zend\Hydrator\Strategy\StrategyInterface;

class BoundingPolyStrategy implements StrategyInterface
{
    /**
     * @param BoundingPoly $value
     * @return array
     */
    public function extract($value)
    {
        $verticles = $value ? $value->getVertices() : [];
        $verticleMap = array_map(function(Vertex $vertex) {
            return array_filter([
                'x' => $vertex->getX(),
                'y' => $vertex->getY(),
            ]);
        }, $verticles);

        return [
            'vertices' => $verticleMap
        ];
    }

    /**
     * @param array $value
     * @return BoundingPoly
     */
    public function hydrate($value)
    {
        $boundingPoly = new BoundingPoly;
        foreach ($value['vertices'] as $vertex) {
            $x = isset($vertex['x']) ? $vertex['x'] : null;
            $y = isset($vertex['y']) ? $vertex['y'] : null;
            
            $boundingPoly->addVertex(new Vertex($x, $y));
        }

        return $boundingPoly;
    }
}
