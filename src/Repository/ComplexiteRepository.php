<?php

namespace App\Repository;

use App\Entity\Complexite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Complexite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Complexite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Complexite[]    findAll()
 * @method Complexite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComplexiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Complexite::class);
    }

    // /**
    //  * @return Complexite[] Returns an array of Complexite objects
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
    public function findOneBySomeField($value): ?Complexite
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
