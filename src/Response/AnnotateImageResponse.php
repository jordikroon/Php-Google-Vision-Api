<?php

namespace Vision\Response;

use Vision\Annotation\Error;
use Vision\Annotation\FaceAnnotation;
use Vision\Annotation\ImagePropertiesAnnotation;
use Vision\Annotation\SafeSearchAnnotation;
use Vision\Annotation\EntityAnnotation;
use Vision\Annotation\WebDetection;

class AnnotateImageResponse
{
    /**
     * @var FaceAnnotation[]
     */
    protected $faceAnnotations = [];

    /**
     * @var EntityAnnotation
     */
    protected $landmarkAnnotations = [];

    /**
     * @var EntityAnnotation[]
     */
    protected $logoAnnotations = [];

    /**
     * @var EntityAnnotation[]
     */
    protected $labelAnnotations = [];

    /**
     * @var EntityAnnotation[]
     */
    protected $textAnnotations = [];

    /**
     * @var SafeSearchAnnotation
     */
    protected $safeSearchAnnotation;

    /**
     * @var ImagePropertiesAnnotation
     */
    protected $imagePropertiesAnnotation;

    /**
     * @var WebDetection
     */
    protected $webDetection;

    /**
     * Only set on error
     *
     * @var Error
     */
    protected $error;

    /**
     * @return \Vision\Annotation\FaceAnnotation[]
     */
    public function getFaceAnnotations()
    {
        return $this->faceAnnotations;
    }

    /**
     * @param \Vision\Annotation\FaceAnnotation[] $faceAnnotations
     */
    public function setFaceAnnotations($faceAnnotations)
    {
        $this->faceAnnotations = $faceAnnotations;
    }

    /**
     * @return EntityAnnotation
     */
    public function getLandmarkAnnotations()
    {
        return $this->landmarkAnnotations;
    }

    /**
     * @param EntityAnnotation $landmarkAnnotations
     */
    public function setLandmarkAnnotations($landmarkAnnotations)
    {
        $this->landmarkAnnotations = $landmarkAnnotations;
    }

    /**
     * @return EntityAnnotation[]
     */
    public function getLogoAnnotations()
    {
        return $this->logoAnnotations;
    }

    /**
     * @param EntityAnnotation[] $logoAnnotations
     */
    public function setLogoAnnotations($logoAnnotations)
    {
        $this->logoAnnotations = $logoAnnotations;
    }

    /**
     * @return EntityAnnotation[]
     */
    public function getLabelAnnotations()
    {
        return $this->labelAnnotations;
    }

    /**
     * @param EntityAnnotation[] $labelAnnotations
     */
    public function setLabelAnnotations($labelAnnotations)
    {
        $this->labelAnnotations = $labelAnnotations;
    }

    /**
     * @return EntityAnnotation[]
     */
    public function getTextAnnotations()
    {
        return $this->textAnnotations;
    }

    /**
     * @param EntityAnnotation[] $textAnnotations
     */
    public function setTextAnnotations($textAnnotations)
    {
        $this->textAnnotations = $textAnnotations;
    }

    /**
     * @return SafeSearchAnnotation
     */
    public function getSafeSearchAnnotation()
    {
        return $this->safeSearchAnnotation;
    }

    /**
     * @param SafeSearchAnnotation $safeSearchAnnotation
     */
    public function setSafeSearchAnnotation($safeSearchAnnotation)
    {
        $this->safeSearchAnnotation = $safeSearchAnnotation;
    }

    /**
     * @return ImagePropertiesAnnotation
     */
    public function getImagePropertiesAnnotation()
    {
        return $this->imagePropertiesAnnotation;
    }

    /**
     * @param ImagePropertiesAnnotation $imagePropertiesAnnotation
     */
    public function setImagePropertiesAnnotation($imagePropertiesAnnotation)
    {
        $this->imagePropertiesAnnotation = $imagePropertiesAnnotation;
    }

    /**
     * @return WebDetection
     */
    public function getWebDetection()
    {
        return $this->webDetection;
    }

    /**
     * @param WebDetection $webDetection
     */
    public function setWebDetection($webDetection)
    {
        $this->webDetection = $webDetection;
    }

    /**
     * @return Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param Error $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
