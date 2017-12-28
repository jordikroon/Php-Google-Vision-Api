<?php

namespace Vision\Tests\Request\Image;

use Vision\Request\Image\LocalImage;

class LocalImageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Vision\Exception\ImageException
     * @expectedExceptionMessage Could not load the given image
     */
    public function testExceptionOnInvalidImage()
    {
        new LocalImage('path/to/notfound');
    }

    public function testLocalImageIsEncoded()
    {
        $image = new LocalImage(__dir__ . '/../../Resources/testimage.jpg');
        $this->assertEquals($this->getTestImageBase(), $image->getValue());
    }

    /**
     * @return string
     */
    protected function getTestImageBase()
    {
        return "/9j/4AAQSkZJRgABAQEAYABgAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2ODApLCBxdWFsaXR5ID0gOTAK/9sAQwADAgIDAgIDAwMDBAMDBAUIBQUEBAUKBwcGCAwKDAwLCgsLDQ4SEA0OEQ4LCxAWEBETFBUVFQwPFxgWFBgSFBUU/9sAQwEDBAQFBAUJBQUJFA0LDRQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU/8AAEQgAJAAkAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A/VLHHWkx71meJ/EVt4U8O6lrN3HNNb2MDzvFbpukcKM7UBIyx6DJHJ6ivl3UP+Chui2V28MvgTXtNCnGNZH2V/xCq4H4E1LkluB9a/jR+NfMfh39uvw3rRl+0aWtiFGV/wBLeUv7DEPB+uK9F+GP7SnhX4o+I20Gyju7HVfJaeOK68srOi43FCjseMj7wWndAtdj1j8aKMiimBheOvD8vivwdrGkW8iQz3ls8UbyZ2hiOM45xnHTP0NfHvi2e9+H1vc23iPTNS0hUGPPntJGtm/3Z0DRH1xuz6gV9vcY6UVLVyXG5+T2teLNE1wm0sbq2v7l2Pl2tmvnysfZUBJP0r379hz4DeLPD/xHvvHOt6Bc+HdJ+wS2lrDqcRt7qaR3TJEDAOigI2S4UnK4BGSPuT86Tj0pKCTuNXSs2Lj2opMD0oqxi9qCKKKAAj3ox05oooAAMjrRRRQB/9k=";
    }
}
