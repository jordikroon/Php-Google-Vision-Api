<?php

namespace Vision\Annotation;

class WebDetectionParams
{
    /**
     * @var boolean
     */
    protected $includeGeoResults = false;

    /**
     * @param bool $includeGeoResults
     */
    public function __construct($includeGeoResults)
    {
        $this->includeGeoResults = $includeGeoResults;
    }

    /**
     * @return bool
     */
    public function isIncludeGeoResults()
    {
        return $this->includeGeoResults;
    }

    /**
     * @param bool $includeGeoResults
     */
    public function setIncludeGeoResults($includeGeoResults)
    {
        $this->includeGeoResults = $includeGeoResults;
    }
}
