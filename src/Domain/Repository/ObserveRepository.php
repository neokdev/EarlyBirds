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
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Observe::class);
    }

    public function save(Observe $observe)
    {
        $this->_em->persist($observe);
        $this->_em->flush();
    }
}
