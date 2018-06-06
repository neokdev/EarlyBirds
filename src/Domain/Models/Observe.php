<?php

namespace App\Domain\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use GuzzleHttp\Psr7\UploadedFile;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Observe
{
    use TimestampableEntity;
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
     * @var UploadedFile
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
    private $upvoter;

    /**
     * Observe constructor.
     */
    public function __construct()
    {
        $this->id      = Uuid::uuid4();
        $this->upvoter = new ArrayCollection();
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
     * @return Observe
     */
    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return TaxRef|null
     */
    public function getRef(): ?TaxRef
    {
        return $this->ref;
    }

    /**
     * @param TaxRef|null $ref
     *
     * @return Observe
     */
    public function setRef(?TaxRef $ref): self
    {
        $this->ref = $ref;

        return $this;
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
     * @return UploadedFile
     */
    public function getImg(): UploadedFile
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
     * @return User|null
     */
    public function getValidator(): ?User
    {
        return $this->validator;
    }

    /**
     * @param User|null $validator
     *
     * @return Observe
     */
    public function setValidator(?User $validator): self
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUpvoter(): Collection
    {
        return $this->upvoter;
    }

    /**
     * @param User $upvoter
     *
     * @return Observe
     */
    public function addUpvoter(User $upvoter): self
    {
        if (!$this->upvoter->contains($upvoter)) {
            $this->upvoter[] = $upvoter;
        }

        return $this;
    }

    /**
     * @param User $upvoter
     *
     * @return Observe
     */
    public function removeUpvoter(User $upvoter): self
    {
        if ($this->upvoter->contains($upvoter)) {
            $this->upvoter->removeElement($upvoter);
        }

        return $this;
    }
}
