<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LevelRepository")
 */
class Level
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $img;

    /**
     * @var User
     */
    private $user;

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
