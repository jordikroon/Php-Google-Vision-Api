<?php

namespace Vision\Annotation;

class Vertex
{
    /**
     * @var float|null
     */
    protected $x;

    /**
     * @var float|null
     */
    protected $y;

    /**
     * @param float|null $x
     * @param float|null $y
     */
    public function __construct($x = null, $y = null)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return float|null
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param float|null $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return float|null
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param float|null $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }
}
