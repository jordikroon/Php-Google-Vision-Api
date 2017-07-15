<?php

namespace Vision\Annotation;

class CropHintsAnnotation
{
    /**
     * @var CropHint[]
     */
    protected $cropHints;

    /**
     * @return CropHint[]
     */
    public function getCropHints()
    {
        return $this->cropHints;
    }

    /**
     * @param CropHint[] $cropHints
     */
    public function setCropHints($cropHints)
    {
        $this->cropHints = $cropHints;
    }
}
