<?php

namespace Vision\Annotation;

class SafeSearchAnnotation
{
    /**
     * @see Likelihood
     * @var string
     */
    protected $adult = Likelihood::UNKNOWN;

    /**
     * @see Likelihood
     * @var string
     */
    protected $spoof = Likelihood::UNKNOWN;

    /**
     * @see Likelihood
     * @var string
     */
    protected $medical = Likelihood::UNKNOWN;

    /**
     * @see Likelihood
     * @var string
     */
    protected $violence = Likelihood::UNKNOWN;

    /**
     * @return string
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @param string $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;
    }

    /**
     * @return string
     */
    public function getSpoof()
    {
        return $this->spoof;
    }

    /**
     * @param string $spoof
     */
    public function setSpoof($spoof)
    {
        $this->spoof = $spoof;
    }

    /**
     * @return string
     */
    public function getMedical()
    {
        return $this->medical;
    }

    /**
     * @param string $medical
     */
    public function setMedical($medical)
    {
        $this->medical = $medical;
    }

    /**
     * @return string
     */
    public function getViolence()
    {
        return $this->violence;
    }

    /**
     * @param string $violence
     */
    public function setViolence($violence)
    {
        $this->violence = $violence;
    }
}
