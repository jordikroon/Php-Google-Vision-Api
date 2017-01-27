<?php

namespace Vision\Annotation;

class BoundingPoly
{
    /**
     * @var Vertex[]
     */
    protected $vertices = [];

    /**
     * @return Vertex[]
     */
    public function getVertices()
    {
        return $this->vertices;
    }

    /**
     * @param Vertex $vertex
     */
    public function addVertex($vertex)
    {
        $this->vertices[] = $vertex;
    }
}
