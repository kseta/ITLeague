<?php

namespace AppBundle\Entity\Criteria;

class SearchPlayerCriteriaBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testCriteriaを構築できる()
    {
        $criteriaBuilder = new SearchPlayerCriteriaBuilder();

        $this->assertInstanceOf('\AppBundle\Entity\Criteria\Criteria', $criteriaBuilder->build());
    }

    public function testPlayerIdを条件にしたCriteriaを構築できる()
    {
        $playerIds = [1, 2, 3];
        $criteriaBuilder = new SearchPlayerCriteriaBuilder();
        $criteriaBuilder->setPlayerIds($playerIds);
        $criteria = $criteriaBuilder->build();
        $whereExpression = $criteria->getWhereExpression();

        $this->assertEquals('id',       $whereExpression->getField());
        $this->assertEquals($playerIds, $whereExpression->getValue()->getValue());
    }
}
