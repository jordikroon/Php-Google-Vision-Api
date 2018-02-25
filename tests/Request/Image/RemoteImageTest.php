<?php

namespace Vision\Tests\Request\Image;

use Vision\Request\Image\RemoteImage;

class RemoteImageTest extends \PHPUnit_Framework_TestCase
{
    public function testValueIsArray()
    {
        $remoteImage = new RemoteImage('test');

        $value = $remoteImage->getValue();
        $this->assertArrayHasKey('imageUri',$value);
        $this->assertEquals('test', $value['imageUri']);
    }
}
