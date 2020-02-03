<?php

namespace App\Repository;

use App\Entity\UrlRedirect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UrlRedirect|null find($id, $lockMode = null, $lockVersion = null)
 * @method UrlRedirect|null findOneBy(array $criteria, array $orderBy = null)
 * @method UrlRedirect[]    findAll()
 * @method UrlRedirect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlRedirectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UrlRedirect::class);
    }

    // /**
    //  * @return UrlRedirect[] Returns an array of UrlBase objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UrlRedirect
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
