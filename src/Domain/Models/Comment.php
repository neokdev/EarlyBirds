<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var User
     */
    private $author;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $content;

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
