<?php

namespace App\Domain\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
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
     * @var User
     */
    private $author;

    /**
     * @var TaxRef
     */
    private $ref;

    /**
     * @var string
     */
    private $description;

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
     * @var ArrayCollection
     */
    private $upvoterCollection;

    /**
     * Observe constructor.
     */
    public function __construct()
    {
        $this->id                = Uuid::uuid4();
        $this->upvoterCollection = new ArrayCollection();
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     * @return Collection|null
     */
    public function getUpvoterCollection(): ?Collection
    {
        return $this->upvoterCollection;
    }

    /**
     * @param User $upvoter
     */
    public function addUpvoter(User $upvoter): void
    {
        $this->upvoterCollection->add($upvoter);
        $upvoter->setUpvotes($this);
    }

}
