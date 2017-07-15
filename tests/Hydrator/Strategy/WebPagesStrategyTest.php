<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\WebPage;
use Vision\Hydrator\Strategy\WebPagesStrategy;

class WebPagesStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new WebPagesStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new WebPagesStrategy();
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
                'url' => 'https://www.viator.com/Paris-attractions/Eiffel-Tower/d479-a89',
            ],
            [
                'url' => 'https://www.viator.com/Paris-attractions/Eiffel-Tower/d479-a89',
                'score' => 0.12345
            ]
        ];
    }

    /**
     * @return WebPage[]
     */
    protected function getObjects()
    {
        return [
            new WebPage('https://www.viator.com/Paris-attractions/Eiffel-Tower/d479-a89'),
            new WebPage('https://www.viator.com/Paris-attractions/Eiffel-Tower/d479-a89', 0.12345)
        ];
    }
}
