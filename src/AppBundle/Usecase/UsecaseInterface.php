<?php

namespace AppBundle\Usecase;

use AppBundle\Entity\EntityInterface;

interface UsecaseInterface
{
    public function run(EntityInterface $entity);
}
