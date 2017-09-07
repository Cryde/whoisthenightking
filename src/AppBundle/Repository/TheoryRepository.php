<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TheoryRepository
 *
 */
class TheoryRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function getRandom()
    {
        return $this->createQueryBuilder('theory')
            ->addOrderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
