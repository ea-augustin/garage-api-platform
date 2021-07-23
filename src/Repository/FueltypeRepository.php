<?php

namespace App\Repository;

use App\Entity\Fueltype;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fueltype|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fueltype|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fueltype[]    findAll()
 * @method Fueltype[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FueltypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fueltype::class);
    }

    // /**
    //  * @return Fueltype[] Returns an array of Fueltype objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fueltype
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
