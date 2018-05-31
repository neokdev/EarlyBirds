<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/05/2018
 * Time: 10:12
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ProfileDTOInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProfileDTO implements ProfileDTOInterface
{
    /**
     * @var string
     */
    public $nickname;
    /**
     * @var string
     */
    public $firstname;
    /**
     * @var string
     */
    public $lastname;
    /**
     * @var UploadedFile
     */
    public $img;

    /**
     * ProfileDTO constructor.
     * @param string|null       $nickname
     * @param string|null       $firstname
     * @param string|null       $lastname
     * @param UploadedFile|null $img
     */
    public function __construct(
        string $nickname = null,
        string $firstname = null,
        string $lastname = null,
        UploadedFile $img = null
    ) {
        $this->nickname  = $nickname;
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->img       = $img;
    }

    /**
     * @return null|string
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * @return null|string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @return null|string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @return null|UploadedFile
     */
    public function getImg(): ?UploadedFile
    {
        return $this->img;
    }
}
