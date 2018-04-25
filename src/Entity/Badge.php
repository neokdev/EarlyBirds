<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BadgeRepository")
 */
class Badge
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $category;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $img;

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
