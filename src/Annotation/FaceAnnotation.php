<?php

namespace Vision\Annotation;

class FaceAnnotation
{
    /**
     * @var BoundingPoly
     */
    protected $boundingPoly;

    /**
     * @var BoundingPoly
     */
    protected $fdBoundingPoly;

    /**
     * @var LandMark[]
     */
    protected $landmarks;

    /**
     * @var float
     */
    protected $rollAngle;

    /**
     * @var float
     */
    protected $panAngle;

    /**
     * @var float
     */
    protected $tiltAngle;

    /**
     * @var float
     */
    protected $detectionConfidence;

    /**
     * @var float
     */
    protected $landmarkingConfidence;

    /**
     * @see Likelihood
     * @var string
     */
    protected $joyLikelihood;

    /**
     * @see Likelihood
     * @var string
     */
    protected $sorrowLikelihood;

    /**
     * @see Likelihood
     * @var string
     */
    protected $angerLikelihood;

    /**
     * @see Likelihood
     * @var string
     */
    protected $surpriseLikelihood;

    /**
     * @see Likelihood
     * @var string
     */
    protected $underExposedLikelihood;

    /**
     * @see Likelihood
     * @var string
     */
    protected $blurredLikelihood;

    /**
     * @see Likelihood
     * @var string
     */
    protected $headwearLikelihood;

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
     * @return BoundingPoly
     */
    public function getFdBoundingPoly()
    {
        return $this->fdBoundingPoly;
    }

    /**
     * @param BoundingPoly $fdBoundingPoly
     */
    public function setFdBoundingPoly($fdBoundingPoly)
    {
        $this->fdBoundingPoly = $fdBoundingPoly;
    }

    /**
     * @return Landmark[]
     */
    public function getLandmarks()
    {
        return $this->landmarks;
    }

    /**
     * @param Landmark[] $landmarks
     */
    public function setLandmarks($landmarks)
    {
        $this->landmarks = $landmarks;
    }

    /**
     * @return float
     */
    public function getRollAngle()
    {
        return $this->rollAngle;
    }

    /**
     * @param float $rollAngle
     */
    public function setRollAngle($rollAngle)
    {
        $this->rollAngle = $rollAngle;
    }

    /**
     * @return float
     */
    public function getPanAngle()
    {
        return $this->panAngle;
    }

    /**
     * @param float $panAngle
     */
    public function setPanAngle($panAngle)
    {
        $this->panAngle = $panAngle;
    }

    /**
     * @return float
     */
    public function getTiltAngle()
    {
        return $this->tiltAngle;
    }

    /**
     * @param float $tiltAngle
     */
    public function setTiltAngle($tiltAngle)
    {
        $this->tiltAngle = $tiltAngle;
    }

    /**
     * @return float
     */
    public function getDetectionConfidence()
    {
        return $this->detectionConfidence;
    }

    /**
     * @param float $detectionConfidence
     */
    public function setDetectionConfidence($detectionConfidence)
    {
        $this->detectionConfidence = $detectionConfidence;
    }

    /**
     * @return float
     */
    public function getLandmarkingConfidence()
    {
        return $this->landmarkingConfidence;
    }

    /**
     * @param float $landmarkingConfidence
     */
    public function setLandmarkingConfidence($landmarkingConfidence)
    {
        $this->landmarkingConfidence = $landmarkingConfidence;
    }

    /**
     * @return string
     */
    public function getJoyLikelihood()
    {
        return $this->joyLikelihood;
    }

    /**
     * @param string $joyLikelihood
     */
    public function setJoyLikelihood($joyLikelihood)
    {
        $this->joyLikelihood = $joyLikelihood;
    }

    /**
     * @return string
     */
    public function getSorrowLikelihood()
    {
        return $this->sorrowLikelihood;
    }

    /**
     * @param string $sorrowLikelihood
     */
    public function setSorrowLikelihood($sorrowLikelihood)
    {
        $this->sorrowLikelihood = $sorrowLikelihood;
    }

    /**
     * @return string
     */
    public function getAngerLikelihood()
    {
        return $this->angerLikelihood;
    }

    /**
     * @param string $angerLikelihood
     */
    public function setAngerLikelihood($angerLikelihood)
    {
        $this->angerLikelihood = $angerLikelihood;
    }

    /**
     * @return string
     */
    public function getSurpriseLikelihood()
    {
        return $this->surpriseLikelihood;
    }

    /**
     * @param string $surpriseLikelihood
     */
    public function setSurpriseLikelihood($surpriseLikelihood)
    {
        $this->surpriseLikelihood = $surpriseLikelihood;
    }

    /**
     * @return string
     */
    public function getUnderExposedLikelihood()
    {
        return $this->underExposedLikelihood;
    }

    /**
     * @param string $underExposedLikelihood
     */
    public function setUnderExposedLikelihood($underExposedLikelihood)
    {
        $this->underExposedLikelihood = $underExposedLikelihood;
    }

    /**
     * @return string
     */
    public function getBlurredLikelihood()
    {
        return $this->blurredLikelihood;
    }

    /**
     * @param string $blurredLikelihood
     */
    public function setBlurredLikelihood($blurredLikelihood)
    {
        $this->blurredLikelihood = $blurredLikelihood;
    }

    /**
     * @return string
     */
    public function getHeadwearLikelihood()
    {
        return $this->headwearLikelihood;
    }

    /**
     * @param string $headwearLikelihood
     */
    public function setHeadwearLikelihood($headwearLikelihood)
    {
        $this->headwearLikelihood = $headwearLikelihood;
    }
}
