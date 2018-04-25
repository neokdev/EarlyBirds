<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var bool
     */
    private $userNonExpired;

    /**
     * @var bool
     */
    private $credentialsNonExpired;

    /**
     * @var bool
     */
    private $userNonLocked;

    /**
     * @var int
     */
    private $score;

    /**
     * @var level
     */
    private $level;

    /**
     * @var Badge
     */
    private $badge;

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
