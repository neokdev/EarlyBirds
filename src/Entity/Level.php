<?php

namespace App\Entity;

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
    private $levelName;

    /**
     * @var string
     */
    private $levelDesc;

    /**
     * @var string
     */
    private $levelImg;

    /**
     * @var User
     */
    private $user;

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
