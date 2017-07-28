<?php

namespace Vision;

use Vision\Exception\UnknownFeatureException;

class Feature
{
    const LABEL_DETECTION = 'LABEL_DETECTION';
    const TEXT_DETECTION = 'TEXT_DETECTION';
    const FACE_DETECTION = 'FACE_DETECTION';
    const LANDMARK_DETECTION = 'LANDMARK_DETECTION';
    const LOGO_DETECTION = 'LOGO_DETECTION';
    const SAFE_SEARCH_DETECTION = 'SAFE_SEARCH_DETECTION';
    const IMAGE_PROPERTIES = 'IMAGE_PROPERTIES';
    const WEB_DETECTION = 'WEB_DETECTION';
    const CROP_HINTS = 'CROP_HINTS';
    const DOCUMENT_TEXT_DETECTION = 'DOCUMENT_TEXT_DETECTION';

    /**
     * @see https://cloud.google.com/vision/docs/concepts#types_of_vision_api_requests
     *
     * @var array
     */
    protected $availableFeatureMap = [
        self::LABEL_DETECTION,
        self::IMAGE_PROPERTIES,
        self::TEXT_DETECTION,
        self::FACE_DETECTION,
        self::LANDMARK_DETECTION,
        self::LOGO_DETECTION,
        self::SAFE_SEARCH_DETECTION,
        self::IMAGE_PROPERTIES,
        self::WEB_DETECTION,
        self::CROP_HINTS,
        self::DOCUMENT_TEXT_DETECTION
    ];

    /**
     * @var string
     */
    protected $feature;

    /**
     * @var integer
     */
    protected $maxResults;

    /**
     * @param string $feature
     * @param int $maxResults
     */
    public function __construct($feature, $maxResults)
    {
        if (!in_array($feature, $this->availableFeatureMap)) {
            throw new UnknownFeatureException('Could not find feature with name "' . $feature . '"');
        }

        $this->feature = $feature;
        $this->maxResults = (int)$maxResults;
    }

    /**
     * @return string
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @return int
     */
    public function getMaxResults()
    {
        return $this->maxResults;
    }
}
