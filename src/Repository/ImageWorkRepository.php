<?php

namespace App\Repository;

use App\Entity\ImageWork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageWork|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageWork|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageWork[]    findAll()
 * @method ImageWork[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageWorkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageWork::class);
    }

    // /**
    //  * @return ImageWork[] Returns an array of ImageWork objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageWork
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
