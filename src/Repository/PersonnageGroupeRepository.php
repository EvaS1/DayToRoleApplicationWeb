<?php

namespace App\Repository;

use App\Entity\PersonnageGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PersonnageGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnageGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnageGroupe[]    findAll()
 * @method PersonnageGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnageGroupe::class);
    }

    // /**
    //  * @return PersonnageGroupe[] Returns an array of PersonnageGroupe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonnageGroupe
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
