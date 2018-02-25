<?php

namespace Vision\Tests\Request\Image;

use Vision\Request\Image\GoogleCloudImage;

class GoogleCloudImageTest extends \PHPUnit_Framework_TestCase
{
    public function testGSPrefixIsStripped()
    {
        $googleCloudImage = new GoogleCloudImage('gs://bucket-name');
        $googleCloudImage->setObjectName('object.jpg');

        $value = $googleCloudImage->getValue();
        $this->assertArrayHasKey('imageUri',$value);
        $this->assertEquals('gs://bucket-name/object.jpg', $value['imageUri']);
    }

    public function testGCPrefixIsPrepended()
    {
        $googleCloudImage = new GoogleCloudImage('bucket-name');
        $googleCloudImage->setObjectName('object.jpg');

        $value = $googleCloudImage->getValue();
        $this->assertArrayHasKey('imageUri',$value);
        $this->assertEquals('gs://bucket-name/object.jpg', $value['imageUri']);
    }
}
