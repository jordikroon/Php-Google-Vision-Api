<?php

namespace Vision\Annotation;

class WebPage
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var float|null
     */
    protected $score;

    /**
     * @param string $url
     * @param float|null $score
     */
    public function __construct($url, $score = null)
    {
        $this->url = $url;
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
}
