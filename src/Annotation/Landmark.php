<?php

namespace Vision\Annotation;

class Landmark
{
    /**
     * @see \Vision\Annotation\Type
     * @var string
     */
    protected $type;

    /**
     * @var Position
     */
    protected $position;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Position $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}
