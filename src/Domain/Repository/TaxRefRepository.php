<?php

namespace App\Domain\Repository;

use App\Domain\Models\TaxRef;
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
    /**
     * TaxRefRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaxRef::class);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByIdToArray(int $id)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @param  string $name
     * @return mixed
     */
    public function searchName(string $name)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
                    ->Where($qb->expr()->like('t.nomComplet',':name'))
                    ->setParameter('name', $name.'%')
                    ->getQuery()
                    ->getArrayResult()
        ;

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
