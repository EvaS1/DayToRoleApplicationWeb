<?php

namespace App\Repository;

use App\Entity\ArticleBlog;
use App\Entity\CategorieArticle;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ArticleBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleBlog[]    findAll()
 * @method ArticleBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleBlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleBlog::class);
    }

    /**
    /* @return ArticleBlog[] Returns an array of ArticleBlog objects
    */
    
    public function findByIdCategorie($idCategorie) {


         $qb = $this->createQueryBuilder('a')
            ->where('a.id_categorie = :idCategorie')
            ->setParameter('idCategorie', $idCategorie)
            ->orderBy('a.date', 'DESC');

        $query = $qb->getQuery();

        return $query->execute();
    }
    
    /*
    public function findOneBySomeField($value): ?ArticleBlog
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllOrderedByDate() {
        $qb = $this->createQueryBuilder('a')
                ->orderBy('a.date', 'DESC');

        $qb->innerJoin(
            CategorieArticle::class,
            'c',
            Join::WITH,
            'a.id_categorie = c.id'
        );

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findLastPublishedArticles($limit) {
        return $this->createQueryBuilder('a')
            ->orderBy('a.date', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
}
