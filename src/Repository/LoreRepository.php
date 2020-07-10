<?php

namespace App\Repository;

use App\Entity\Lore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lore[]    findAll()
 * @method Lore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lore::class);
    }

    // /**
    //  * @return Lore[] Returns an array of Lore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lore
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
