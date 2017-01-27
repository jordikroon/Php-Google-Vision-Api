<?php

namespace Vision\Annotation;

class Color
{
    /**
     * @var float
     */
    protected $red;

    /**
     * @var float
     */
    protected $green;

    /**
     * @var float
     */
    protected $blue;

    /**
     * @param float $red
     * @param float $green
     * @param float $blue
     */
    public function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    /**
     * @return float
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @param float $red
     */
    public function setRed($red)
    {
        $this->red = $red;
    }

    /**
     * @return float
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @param float $green
     */
    public function setGreen($green)
    {
        $this->green = $green;
    }

    /**
     * @return float
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param float $blue
     */
    public function setBlue($blue)
    {
        $this->blue = $blue;
    }
}
