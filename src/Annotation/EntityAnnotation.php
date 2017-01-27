<?php

namespace Vision\Annotation;

class EntityAnnotation
{
    /**
     * @var string
     */
    protected $mid;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $score;

    /**
     * @var BoundingPoly
     */
    protected $boundingPoly;

    /**
     * @var Location[]
     */
    protected $locations = [];

    /**
     * @var Property[]
     */
    protected $properties = [];

    /**
     * @return string
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param string $mid
     */
    public function setMid($mid)
    {
        $this->mid = $mid;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return BoundingPoly
     */
    public function getBoundingPoly()
    {
        return $this->boundingPoly;
    }

    /**
     * @param BoundingPoly $boundingPoly
     */
    public function setBoundingPoly($boundingPoly)
    {
        $this->boundingPoly = $boundingPoly;
    }

    /**
     * @return Location[]
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @param Location[] $locations
     */
    public function setLocations($locations)
    {
        $this->locations = $locations;
    }

    /**
     * @return Property[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param Property[] $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }
}
