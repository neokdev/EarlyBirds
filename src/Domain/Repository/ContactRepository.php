<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 11/06/2018
 * Time: 22:38
 */

namespace App\Domain\Repository;


use App\Domain\Models\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry,
                            Contact::class);
    }

    public function save(Contact $contact)
    {
        $this->_em->persist($contact);
        $this->_em->flush();
    }
}