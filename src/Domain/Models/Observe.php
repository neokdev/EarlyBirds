<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Repository\ObserveRepository")
 */
class Observe
{
    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var string
     */
    private $author;
    /**
     * @var TaxRef
     */
    private $ref;
    /**
     * @var string
     */
    private $desc;
    /**
     * @var string
     */
    private $latitude;
    /**
     * @var string
     */
    private $longitude;
    /**
     * @var string
     */
    private $img;
    /**
     * @var User
     */
    private $validator;
    /**
     * @var string
     */
    private $status;
    /**
     * @var int
     */
    private $upvote;
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
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return TaxRef
     */
    public function getRef(): TaxRef
    {
        return $this->ref;
    }

    /**
     * @param TaxRef $ref
     */
    public function setRef(TaxRef $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return User
     */
    public function getValidator(): User
    {
        return $this->validator;
    }

    /**
     * @param User $validator
     */
    public function setValidator(User $validator): void
    {
        $this->validator = $validator;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getUpvote(): int
    {
        return $this->upvote;
    }

    /**
     * @param int $upvote
     */
    public function setUpvote(int $upvote): void
    {
        $this->upvote = $upvote;
    }

}
