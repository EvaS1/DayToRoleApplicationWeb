<?php

namespace App\Repository;

use App\Entity\SupportVisuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SupportVisuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupportVisuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupportVisuel[]    findAll()
 * @method SupportVisuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupportVisuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupportVisuel::class);
    }

    // /**
    //  * @return SupportVisuel[] Returns an array of SupportVisuel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SupportVisuel
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
