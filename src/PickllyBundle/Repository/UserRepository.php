<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11/12/16
 * Time: 00:25
 */

namespace TransBundle\Repository;

use Doctrine\ORM\EntityRepository;


class UserRepository extends EntityRepository
{
    public function findTranslator($demand)
    {
    }
}