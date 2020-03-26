<?php

namespace App\Repository;

use App\Entity\PersonnageObjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PersonnageObjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnageObjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnageObjet[]    findAll()
 * @method PersonnageObjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageObjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnageObjet::class);
    }

    // /**
    //  * @return PersonnageObjet[] Returns an array of PersonnageObjet objects
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
    public function findOneBySomeField($value): ?PersonnageObjet
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
