<?php

namespace App\Repository;

use App\Entity\TaxRef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaxRef|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxRef|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxRef[]    findAll()
 * @method TaxRef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxRefRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxRef::class);
    }

//    /**
//     * @return TaxRef[] Returns an array of TaxRef objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaxRef
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
