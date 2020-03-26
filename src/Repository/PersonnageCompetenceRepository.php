<?php

namespace App\Repository;

use App\Entity\PersonnageCompetence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PersonnageCompetence|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnageCompetence|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnageCompetence[]    findAll()
 * @method PersonnageCompetence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageCompetenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnageCompetence::class);
    }

    // /**
    //  * @return PersonnageCompetence[] Returns an array of PersonnageCompetence objects
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
    public function findOneBySomeField($value): ?PersonnageCompetence
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
