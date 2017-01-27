<?php

namespace Vision\Annotation;

class DominantColor
{
    /**
     * @var Color
     */
    protected $color;

    /**
     * @var float
     */
    protected $score;

    /**
     * @var float
     */
    protected $pixelFraction;

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param Color $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return float
     */
    public function getPixelFraction()
    {
        return $this->pixelFraction;
    }

    /**
     * @param float $pixelFraction
     */
    public function setPixelFraction($pixelFraction)
    {
        $this->pixelFraction = $pixelFraction;
    }
}
