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
     * @var string
     */
    private $img;

    /**
     * @var User
     */
    private $favouredBy;

    /**
     * @var Comment
     */
    private $postComments;

    /**
     * Post constructor.
     * @param string $title
     * @param string $content
     * @param User   $author
     * @param string $category
     * @param string $img
     */
    public function __construct(
        string $title,
        string $content,
        User   $author,
        string $category,
        string $img
    ) {
        $this->id           = Uuid::uuid4();
        $this->favouredBy   = new ArrayCollection();
        $this->author       = $author;
        $this->title        = $title;
        $this->category     = $category;
        $this->content      = $content;
        $this->img          = $img;
        $this->postComments = new ArrayCollection();
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

    /**
     * @return Collection|Comment[]
     */
    public function getPostComments()
    {
        return $this->postComments;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addPostComments(Comment $comment): self
    {
        if (!$this->postComments->contains($comment)) {
            $this->postComments[] = $comment;
            $comment->setPost($this);
        }
        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function removePostComments(Comment $comment) :self
    {
        if ($this->postComments->contains($comment)) {
            $this->postComments->removeElement($comment);
        }

        return $this;
    }
}
