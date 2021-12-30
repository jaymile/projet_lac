<?php

namespace App\Repository;

use App\Entity\CommentLodging;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentLodging|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentLodging|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentLodging[]    findAll()
 * @method CommentLodging[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentLodgingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentLodging::class);
    }

    // /**
    //  * @return CommentLodging[] Returns an array of CommentLodging objects
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
    public function findOneBySomeField($value): ?CommentLodging
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
