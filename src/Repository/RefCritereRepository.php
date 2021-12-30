<?php

namespace App\Repository;

use App\Entity\RefCritere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefCritere|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefCritere|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefCritere[]    findAll()
 * @method RefCritere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefCritereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefCritere::class);
    }

    // /**
    //  * @return RefCritere[] Returns an array of RefCritere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RefCritere
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
