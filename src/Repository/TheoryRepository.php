<?php

namespace App\Repository;

use App\Entity\Theory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * TheoryRepository
 *
 */
class TheoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Theory::class);
    }

    /**
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
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
