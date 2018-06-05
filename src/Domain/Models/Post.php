<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Repository\PostRepository")
 */
class Post
{
    use TimestampableEntity;
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var User
     */
    private $author;

    /**
     * @var string
     */
    private $category;

    /**
     * @var \DateTime
     */
    private $date;

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

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param User|null $author
     *
     * @return Post
     */
    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
