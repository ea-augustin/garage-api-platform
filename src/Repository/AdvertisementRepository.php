<?php

namespace App\Repository;

use App\Entity\Advertisement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Advertisement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advertisement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advertisement[]    findAll()
 * @method Advertisement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertisementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Advertisement::class);
    }

    public function search($filters)
    {
        $query = $this->createQueryBuilder('a')
            ->join("a.fueltype", 'fueltype')
            ->join("a.brand", 'brand')
            ->join('brand.model', 'model');


        if (!is_null($filters['brand'])) {
            $query->andWhere('model.id = :id')->setParameter('id', $filters['brand']);
        }

        if (!is_null($filters['fueltype'])) {
            $query->andWhere('fueltype.id = :fueltype')->setParameter('fueltype', $filters['fueltype']);
        }
        if (!is_null($filters['model'])) {
            $query->andWhere('model.id = :modelId')->setParameter('modelId', $filters['model']);
        }
        if (!is_null($filters['maxKm'])) {
            $query->andWhere('a.mileage_adv <= :maxKm')->setParameter('maxKm', $filters['maxKm']);
        }
        if (!is_null($filters['minKm'])) {
            $query->andWhere('a.mileage_adv >= :minKm')->setParameter('minKm', $filters['minKm']);
        }
        if (!is_null($filters['maxYear'])) {
            $query->andWhere('a.year <= :maxYear')->setParameter('maxYear', $filters['maxYear']);
        }
        if (!is_null($filters['minYear'])) {
            $query->andWhere('a.year >= :minYear')->setParameter('minYear', $filters['minYear']);
        }
        if (!is_null($filters['maxPrice'])) {
            $query->andWhere('a.price_adv <= :maxPrice')->setParameter('maxPrice', $filters['maxPrice']);
        }
        if (!is_null($filters['minPrice'])) {
            $query->andWhere('a.price_adv >= :minPrice')->setParameter('minPrice', $filters['minPrice']);
        }

        return $query->getQuery()->getResult();
    }


    // /**
    //  * @return Advertisement[] Returns an array of Advertisement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Advertisement
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
