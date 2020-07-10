<?php

namespace App\Repository;

use App\Entity\Univers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Univers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Univers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Univers[]    findAll()
 * @method Univers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UniversRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Univers::class);
    }

    // /**
    //  * @return Univers[] Returns an array of Univers objects
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
    public function findOneBySomeField($value): ?Univers
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
