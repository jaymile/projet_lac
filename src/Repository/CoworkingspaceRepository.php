<?php

namespace App\Repository;

use App\Entity\Coworkingspace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Coworkingspace|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coworkingspace|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coworkingspace[]    findAll()
 * @method Coworkingspace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoworkingspaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coworkingspace::class);
    }

    // /**
    //  * @return Coworkingspace[] Returns an array of Coworkingspace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Coworkingspace
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
