<?php

namespace Vision\Request\Image;

class GoogleCloudImage extends AbstractImage implements ImageInterface
{
    /**
     * @var string
     */
    protected $bucket;

    /**
     * @param string $bucket
     * @param $objectName
     */
    public function __construct($bucket, $objectName = null)
    {
        $this->bucket = str_replace('gs://', '', $bucket);
        $this->setObjectName($objectName);
    }

    /**
     * @param string $objectName
     */
    public function setObjectName($objectName)
    {
        $this->value = $objectName;
    }

    /**
     * @return array
     */
    public function getValue()
    {
        return ['imageUri' => 'gs://' . $this->bucket . '/' . $this->value];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'source';
    }
}
