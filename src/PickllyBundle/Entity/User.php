<?php
    

namespace PickllyBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="points", type="integer", nullable=true)
	 *
	 */
	private $points;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="status", type="boolean", nullable=true)
	 *
	 */
	private $status;

    /**
     * @ORM\OneToMany(targetEntity="Media", mappedBy="users")
     */
    private $medias;

    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="users")
     */
    private $games;

    /**
     * @return mixed
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * @param mixed $medias
     */
    public function setMedias($medias)
    {
        $this->medias = $medias;
    }	

    /**
     * Set points
     *
     * @param integer $points
     * @return User
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add medias
     *
     * @param \PickllyBundle\Entity\Media $medias
     * @return User
     */
    public function addMedia(\PickllyBundle\Entity\Media $medias)
    {
        $this->medias[] = $medias;

        return $this;
    }

    /**
     * Remove medias
     *
     * @param \PickllyBundle\Entity\Media $medias
     */
    public function removeMedia(\PickllyBundle\Entity\Media $medias)
    {
        $this->medias->removeElement($medias);
    }

    /**
     * Set games
     *
     * @param \PickllyBundle\Entity\Game $games
     * @return User
     */
    public function setGames(\PickllyBundle\Entity\Game $games = null)
    {
        $this->games = $games;

        return $this;
    }

    /**
     * Get games
     *
     * @return \PickllyBundle\Entity\Game 
     */
    public function getGames()
    {
        return $this->games;
    }
}
