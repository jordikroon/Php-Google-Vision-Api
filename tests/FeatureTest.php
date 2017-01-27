<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Feature;

class FeatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Vision\Exception\UnknownFeatureException
     */
    public function testShouldDisallowUnknownFeature()
    {
        new Feature('Unknown feature', 12);
    }
}
