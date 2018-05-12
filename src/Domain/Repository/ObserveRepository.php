<?php

namespace App\Domain\Repository;

use App\Entity\Observe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Observe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Observe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Observe[]    findAll()
 * @method Observe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObserveRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Observe::class);
    }

//    /**
//     * @return Watching[] Returns an array of Watching objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Watching
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
