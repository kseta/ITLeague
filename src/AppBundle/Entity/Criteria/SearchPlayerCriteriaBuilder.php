<?php

namespace AppBundle\Entity\Criteria;

class SearchPlayerCriteriaBuilder implements CriteriaBuilderInterface
{
    private $playerIds = [];

    private $orderBy = [];

    public function setPlayerIds(array $playerIds = [])
    {
        $this->playerIds = $playerIds;
    }

    public function build(): Criteria
    {
        $criteria = Criteria::create();
        $criteria->andWhere($criteria->expr()->in('id', $this->playerIds));
        $criteria->orderBy($this->orderBy);

        return $criteria;
    }
}
