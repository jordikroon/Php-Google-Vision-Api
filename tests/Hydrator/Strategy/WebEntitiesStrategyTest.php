<?php

namespace Vision\Tests\Hydrator\Strategy;

use Vision\Annotation\WebEntity;
use Vision\Hydrator\Strategy\WebEntitiesStrategy;

class WebEntitiesStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testHydratesArray()
    {
        $strategy = new WebEntitiesStrategy();
        $object = $strategy->hydrate($this->getArray());

        $this->assertEquals($this->getObjects(), $object);
    }

    public function testExtractsObject()
    {
        $strategy = new WebEntitiesStrategy();
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
                'entityId' => '/g/11cnx_67bx',
                'description' => 'Eiffel Tower',
                'score' => 0.76444
            ],
            [
                'entityId' => '/m/01fdzj',
                'description' => 'Tower'
            ],
        ];
    }

    /**
     * @return WebEntity[]
     */
    protected function getObjects()
    {
        return [
            new WebEntity('/g/11cnx_67bx', 'Eiffel Tower', 0.76444),
            new WebEntity('/m/01fdzj', 'Tower')
        ];
    }
}
