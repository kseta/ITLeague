<?php

namespace AppBundle\Entity\Criteria;

interface CriteriaBuilderInterface extends CriteriaInterface
{
    /**
     * @return Criteria
     */
    public function build(): Criteria;
}
