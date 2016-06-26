<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeasonTeam
 *
 * @ORM\Table(name="season_team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeasonTeamRepository")
 */
class SeasonTeam
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="season_id", type="integer")
     */
    private $seasonId;

    /**
     * @var int
     *
     * @ORM\Column(name="team_id", type="integer")
     */
    private $teamId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set seasonId
     *
     * @param integer $seasonId
     * @return SeasonTeam
     */
    public function setSeasonId($seasonId)
    {
        $this->seasonId = $seasonId;

        return $this;
    }

    /**
     * Get seasonId
     *
     * @return integer 
     */
    public function getSeasonId()
    {
        return $this->seasonId;
    }

    /**
     * Set teamId
     *
     * @param integer $teamId
     * @return SeasonTeam
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;

        return $this;
    }

    /**
     * Get teamId
     *
     * @return integer 
     */
    public function getTeamId()
    {
        return $this->teamId;
    }
}
