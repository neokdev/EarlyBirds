<?php

namespace App\Domain\Models;

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
     * Post constructor.
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
