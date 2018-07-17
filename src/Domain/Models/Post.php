<?php

namespace App\Domain\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $title;

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
     * @var User
     */
    private $favouredBy;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->id         = Uuid::uuid4();
        $this->favouredBy = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getFavouredBy(): Collection
    {
        return $this->favouredBy;
    }

    /**
     * @param User $favouredBy
     *
     * @return Post
     */
    public function addFavouredBy(User $favouredBy): self
    {
        if (!$this->favouredBy->contains($favouredBy)) {
            $this->favouredBy[] = $favouredBy;
            $favouredBy->addFavoured($this);
        }

        return $this;
    }

    /**
     * @param User $favouredBy
     *
     * @return Post
     */
    public function removeFavouredBy(User $favouredBy): self
    {
        if ($this->favouredBy->contains($favouredBy)) {
            $this->favouredBy->removeElement($favouredBy);
            $favouredBy->removeFavoured($this);
        }

        return $this;
    }
}
