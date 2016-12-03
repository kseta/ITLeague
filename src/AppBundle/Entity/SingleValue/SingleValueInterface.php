<?php

namespace AppBundle\Entity\SingleValue;

use AppBundle\Entity\EntityInterface;

interface SingleValueInterface extends EntityInterface
{
    public function getValue();
}