<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\DetectedLanguage;
use Vision\Hydrator\Strategy\DetectedLanguagesStrategy;

class DetectedLanguagesStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new DetectedLanguagesStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new DetectedLanguagesStrategy();
        $array = $strategy->extract($this->getObjects());

        $this->assertEquals($this->getArray(), $array);
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return [
            [
                'languageCode' => 'en',
            ],
            [
                'languageCode' => 'nl',
                'confidence' => 0.5,
            ],
        ];
    }

    /**
     * @return DetectedLanguage[]
     */
    protected function getObjects()
    {
        return [
            new DetectedLanguage('en'),
            new DetectedLanguage('nl', 0.5),
        ];
    }
}
