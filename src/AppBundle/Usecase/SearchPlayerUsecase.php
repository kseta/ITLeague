<?php

namespace AppBundle\Usecase;

use AppBundle\Entity\Criteria\CriteriaInterface;
use AppBundle\Entity\EntityInterface;
use AppBundle\Exception\InvalidArgumentException;
use AppBundle\Repository\PlayerRepository;

class SearchPlayerUsecase implements QueryUsecaseInterface
{
    private $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(EntityInterface $entity)
    {
        if (!$entity instanceof CriteriaInterface) {
            throw new InvalidArgumentException();
        }

        $players = $this->repository->matching($entity)->getValues();

        return $players;
    }
}
