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
	 * @ORM\Column(name="points", type="integer")
	 *
	 */
	private $points;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="status", type="boolean")
	 *
	 */
	private $status;
}