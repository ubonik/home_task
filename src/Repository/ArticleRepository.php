<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Article[] Returns an array of Article objects
     */

    public function findLatestPublished()
    {
        return $this->published($this->latest())
            ->leftJoin('a.comments', 'c')
            ->addSelect('c')
            ->leftJoin('a.tags', 't')
            ->addSelect('t')
            ->getQuery()
            ->getResult();
    }

    public function findAllPublishedLastWeek()
    {
        return $this->published($this->latest())
            ->andWhere('a.publishedAt >= :week_ago')
            ->setParameter('week_ago', new \DateTime('-2 week'))
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    public function findLatest()
    {
        return $this->latest()
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Article[] Returns an array of Article objects
     */

    public function findPublished()
    {

        return $this->published()
            ->getQuery()
            ->getResult();
    }

    private function published(QueryBuilder $db = null)
    {
        return $this->getOrCreateQueryBuilder($db)->andWhere('a.publishedAt IS NOT NULL');
    }

    public function latest(QueryBuilder $db = null)
    {
        return $this->getOrCreateQueryBuilder($db)->orderBy('a.publishedAt', 'DESC');
    }

    private function getOrCreateQueryBuilder(?QueryBuilder $db = null): QueryBuilder
    {
        return $db ?? $this->createQueryBuilder('a');
    }

    public function findAllWithSearchQuery(?string $search)
    {
        $db = $this->createQueryBuilder('a');

        if ($search) {
            $db
                ->andWhere('a.title LIKE :search OR a.body LIKE :search OR u.firstName LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        return $db
            ->leftJoin('a.author', 'u')
            ->addSelect('u')
            ->orderBy('a.createdAt', 'DESC');
    }

}
