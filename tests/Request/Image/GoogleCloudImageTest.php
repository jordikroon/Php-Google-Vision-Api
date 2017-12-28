<?php

namespace Vision\Tests\Request\Image;

use Vision\Request\Image\GoogleCloudImage;

class GoogleCloudImageTest extends \PHPUnit_Framework_TestCase
{
    public function testGSPrefixIsStripped()
    {
        $googleCloudImage = new GoogleCloudImage('gs://bucket-name');
        $googleCloudImage->setObjectName('object.jpg');

        $this->assertEquals('gs://bucket-name/object.jpg', $googleCloudImage->getValue());
    }

    public function testGCPrefixIsPrepended()
    {
        $googleCloudImage = new GoogleCloudImage('bucket-name');
        $googleCloudImage->setObjectName('object.jpg');

        $this->assertEquals('gs://bucket-name/object.jpg', $googleCloudImage->getValue());
    }
}
