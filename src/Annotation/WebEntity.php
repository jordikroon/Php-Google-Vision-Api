<?php

namespace Vision\Annotation;

class WebEntity
{
    /**
     * @var string
     */
    protected $entityId;

    /**
     * @var float|null
     */
    protected $score;

    /**
     * @var string
     */
    protected $description;

    /**
     * @param string $entityId
     * @param float|null $score
     * @param string $description
     */
    public function __construct($entityId, $description, $score = null)
    {
        $this->entityId = $entityId;
        $this->description = $description;
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param string $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }

    /**
     * @return float|null
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float|null $score
     */
    public function setScore($score)
    {
        $this->score = $score;
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
}
