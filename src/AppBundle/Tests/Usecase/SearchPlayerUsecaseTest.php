<?php

namespace AppBundle\Usecase;

class SearchPlayerUsecaseTest extends \PHPUnit_Framework_TestCase
{
    private $criteria;

    private $entity;

    private $entities;

    private $repository;

    public function setUp()
    {
        $this->criteria   = $this->prophesize('\AppBundle\Entity\Criteria\Criteria');
        $this->entity     = $this->prophesize('\AppBundle\Entity\Player');
        $this->entities   = $this->prophesize('\Doctrine\Common\Collections\ArrayCollection');
        $this->repository = $this->prophesize('\AppBundle\Repository\PlayerRepository');
    }

    public function testPlayerをCriteriaを利用して取得できる()
    {
        $criteria = $this->criteria->reveal();
        $player   = $this->entity->reveal();
        $players  = [$player, $player, $player];

        $this->entities->getValues()->willReturn($players);
        $this->repository->matching($criteria)->willReturn($this->entities);

        $usecase = new SearchPlayerUsecase($this->repository->reveal());
        $this->assertEquals($players, $usecase->run($criteria));
    }

    /**
     * @expectedException \AppBundle\Exception\InvalidArgumentException
     */
    public function testPlayerの検索にCriteria以外を利用するとInvalidArgumentExceptionが発生する()
    {
        $usecase = new SearchPlayerUsecase($this->repository->reveal());
        $usecase->run($this->entity->reveal());
    }
}
