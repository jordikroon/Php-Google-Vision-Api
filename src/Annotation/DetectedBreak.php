<?php

namespace Vision\Annotation;

class DetectedBreak
{
    const TYPE_UNKNOWN = 'UNKNOWN';
    const TYPE_SPACE = 'SPACE';
    const TYPE_SURE_SPACE = 'SURE_SPACE';
    const TYPE_EOL_SURE_SPACE = 'EOL_SURE_SPACE';
    const TYPE_HYPHEN = 'HYPHEN';
    const TYPE_LINE_BREAK = 'LINE_BREAK';

    /**
     * @var string
     */
    protected $type = self::TYPE_UNKNOWN;

    /**
     * @var boolean
     */
    protected $isPrefix = false;

    /**
     * @param string $type
     * @param bool $isPrefix
     */
    public function __construct($type, $isPrefix)
    {
        $this->type = $type;
        $this->isPrefix = $isPrefix;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isPrefix()
    {
        return $this->isPrefix;
    }

    /**
     * @param bool $isPrefix
     */
    public function setIsPrefix($isPrefix)
    {
        $this->isPrefix = $isPrefix;
    }
}
