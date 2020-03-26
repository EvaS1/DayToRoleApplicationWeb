<?php

namespace App\Repository;

use App\Entity\TypeMusique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeMusique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMusique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMusique[]    findAll()
 * @method TypeMusique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMusiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeMusique::class);
    }

    // /**
    //  * @return TypeMusique[] Returns an array of TypeMusique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeMusique
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
