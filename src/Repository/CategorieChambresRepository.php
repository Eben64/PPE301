<?php

namespace App\Repository;

use App\Entity\CategorieChambres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorieChambres>
 *
 * @method CategorieChambres|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieChambres|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieChambres[]    findAll()
 * @method CategorieChambres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieChambresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieChambres::class);
    }

//    /**
//     * @return CategorieChambres[] Returns an array of CategorieChambres objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategorieChambres
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
