<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="ObserveRepository")
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
}
