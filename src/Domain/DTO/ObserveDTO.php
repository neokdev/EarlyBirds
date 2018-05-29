<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 09/05/2018
 * Time: 15:04
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ObserveDTOInterface;
use App\Domain\Models\User;

class ObserveDTO implements ObserveDTOInterface
{
    /**
     * @var string
     */
    public $author;

    /**
     *
     */
    public $ref;

    /**
     * @var string
     */
    public $desc;

    /**
     * @var string
     */
    public $latitude;

    /**
     * @var string
     */
    public $longitude;

    /**
     * @var string
     */
    public $img;

    /**
     *
     */
    public $validator;

    /**
     * @var string
     */
    public $status;

    /**
     * @var User
     */
    public $upvote;

    /**
     * ObserveDTO constructor.
     * @param string $author
     * @param $ref
     * @param string $desc
     * @param string $latitude
     * @param string $longitude
     * @param string $img
     * @param $validator
     * @param string $status
     * @param User $upvote
     */
    public function __construct(
        string $author,
        $ref,
        string $desc,
        string $latitude,
        string $longitude,
        string $img,
        $validator,
        string $status,
        User $upvote
    ) {
        $this->author    = $author;
        $this->ref       = $ref;
        $this->desc      = $desc;
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
        $this->img       = $img;
        $this->validator = $validator;
        $this->status    = $status;
        $this->upvote    = $upvote;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     *
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @return string
     */
    public function getlatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     *
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getUpvote(): int
    {
        return $this->status;
    }



}