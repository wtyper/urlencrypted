<?php

namespace App\Repository;

use App\Entity\UrlBase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UrlBase|null find($id, $lockMode = null, $lockVersion = null)
 * @method UrlBase|null findOneBy(array $criteria, array $orderBy = null)
 * @method UrlBase[]    findAll()
 * @method UrlBase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlBaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UrlBase::class);
    }

    // /**
    //  * @return UrlBase[] Returns an array of UrlBase objects
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
    public function findOneBySomeField($value): ?UrlBase
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
