<?php

namespace AppBundle\Entity\SingleValue;

class PlayerId implements SingleValueInterface
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}