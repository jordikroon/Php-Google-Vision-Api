<?php

namespace Vision\Annotation;

class WebDetection
{
    /**
     * @var WebEntity[]
     */
    protected $webEntities;

    /**
     * @var WebImage[]
     */
    protected $fullMatchingImages;

    /**
     * @var WebImage[]
     */
    protected $partialMatchingImages;

    /**
     * @var WebImage[]
     */
    protected $pagesWithMatchingImages;

    /**
     * @var WebImage[]
     */
    protected $visuallySimilarImages;

    /**
     * @return WebEntity[]
     */
    public function getWebEntities()
    {
        return $this->webEntities;
    }

    /**
     * @param WebEntity[] $webEntities
     */
    public function setWebEntities($webEntities)
    {
        $this->webEntities = $webEntities;
    }

    /**
     * @return WebImage[]
     */
    public function getFullMatchingImages()
    {
        return $this->fullMatchingImages;
    }

    /**
     * @param WebImage[] $fullMatchingImages
     */
    public function setFullMatchingImages($fullMatchingImages)
    {
        $this->fullMatchingImages = $fullMatchingImages;
    }

    /**
     * @return WebImage[]
     */
    public function getPartialMatchingImages()
    {
        return $this->partialMatchingImages;
    }

    /**
     * @param WebImage[] $partialMatchingImages
     */
    public function setPartialMatchingImages($partialMatchingImages)
    {
        $this->partialMatchingImages = $partialMatchingImages;
    }

    /**
     * @return WebImage[]
     */
    public function getPagesWithMatchingImages()
    {
        return $this->pagesWithMatchingImages;
    }

    /**
     * @param WebImage[] $pagesWithMatchingImages
     */
    public function setPagesWithMatchingImages($pagesWithMatchingImages)
    {
        $this->pagesWithMatchingImages = $pagesWithMatchingImages;
    }

    /**
     * @return WebImage[]
     */
    public function getVisuallySimilarImages()
    {
        return $this->visuallySimilarImages;
    }

    /**
     * @param WebImage[] $visuallySimilarImages
     */
    public function setVisuallySimilarImages($visuallySimilarImages)
    {
        $this->visuallySimilarImages = $visuallySimilarImages;
    }
}
