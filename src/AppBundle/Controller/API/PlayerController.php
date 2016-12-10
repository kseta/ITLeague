<?php

namespace AppBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class PlayerController extends FOSRestController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $criteria = $this->container->get('domain.criteria_builder.search_player')->build();
        $players  = $this->container->get('domain.usecase.query.search_player')->run($criteria);

        return $players;
    }

    public function getAction($id)
    {
        $criteriaBuilder = $this->container->get('domain.criteria_builder.search_player');
        $criteriaBuilder->setPlayerIds([$id]);
        $criteria = $criteriaBuilder->build();
        $players  = $this->container->get('domain.usecase.query.search_player')->run($criteria);

        return $players;
    }
}
