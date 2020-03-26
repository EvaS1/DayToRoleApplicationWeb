<?php

namespace App\Repository;

use App\Entity\PersonnageStatistiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PersonnageStatistiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnageStatistiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnageStatistiques[]    findAll()
 * @method PersonnageStatistiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageStatistiquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnageStatistiques::class);
    }

    // /**
    //  * @return PersonnageStatistiques[] Returns an array of PersonnageStatistiques objects
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
    public function findOneBySomeField($value): ?PersonnageStatistiques
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
