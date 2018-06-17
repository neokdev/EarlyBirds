<?php

namespace App\Domain\Repository;

use App\Domain\Models\Observe;
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
    /**
     * ObserveRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Observe::class);
    }

    /**
     * @param Observe $observe
     */
    public function save(Observe $observe)
    {
        $this->_em->persist($observe);
        $this->_em->flush();
    }

    /**
     * @param string $userId
     *
     * @return mixed
     */
    public function findMyObservationsByOrderDesc(string $userId)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.author = :author')
            ->setParameter('author', $userId)
            ->orderBy('p.updatedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return mixed
     */
    public function findNonValidate()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.validator IS NULL')
            ->orderBy('p.updatedAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return mixed
     */
    public function findValidate()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.validator IS NOT NULL')
            ->orderBy('p.updatedAt', 'DESC')
//            ->setMaxResults(25)
            ->getQuery()
            ->getResult();
    }
}
