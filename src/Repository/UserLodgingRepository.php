<?php

namespace App\Repository;

use App\Entity\UserLodging;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserLodging|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserLodging|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserLodging[]    findAll()
 * @method UserLodging[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserLodgingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserLodging::class);
    }

    // /**
    //  * @return UserLodging[] Returns an array of UserLodging objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserLodging
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
