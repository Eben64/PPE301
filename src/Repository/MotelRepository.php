<?php

namespace App\Repository;

use App\Entity\Motel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Motel>
 *
 * @method Motel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Motel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Motel[]    findAll()
 * @method Motel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Motel::class);
    }

//    /**
//     * @return Motel[] Returns an array of Motel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Motel
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
