<?php

namespace Vision\Annotation;

class TextAnnotation
{
    /**
     * @var Page[]
     */
    protected $pages;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param Page[] $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
