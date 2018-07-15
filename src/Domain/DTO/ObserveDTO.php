<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 09/05/2018
 * Time: 15:04
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ObserveDTOInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ObserveDTO
 * @package App\Domain\DTO
 */
class ObserveDTO implements ObserveDTOInterface
{
    /**
     * @var null
     */
    public $ref;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 50,
     *      max = 5000,
     *      minMessage = "votre description doit contenir au moins {{ limit }} carctères",
     *      maxMessage = "votre description doit contenir moins de {{ limit }} carctères"
     * )
     * @var string
     */
    public $description;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "votre latitude doit contenir au moins {{ limit }} carctères"
     * )
     *
     * @var string
     */
    public $latitude;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "votre longitude doit contenir au moins {{ limit }} carctères"
     * )
     * @var string
     */
    public $longitude;

    /**
     * @Assert\Date()
     * @var \DateTime
     */
    public $obsDate;

    /**
     *  @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"image/jpeg", "image/png"},
     *     mimeTypesMessage = "votre image doit être de type jpeg ou png et inférieur à 1025K0"
     * )
     * @var UploadedFile
     */
    public $img;

    /**
     * ObserveDTO constructor.
     *
     * @param null|string       $ref
     * @param string            $description
     * @param string            $latitude
     * @param string            $longitude
     * @param \DateTime         $date
     * @param UploadedFile|null $img
     */
    public function __construct(
                     $ref,
        string       $description,
        string       $latitude,
        string       $longitude,
        \DateTime    $date,
        UploadedFile $img = null
    ) {
        $this->ref          = $ref;
        $this->description  = $description;
        $this->latitude     = $latitude;
        $this->longitude    = $longitude;
        $this->obsDate      = $date;
        $this->img          = $img;
    }

    /**
     * @return null|string
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
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
     * @return \DateTime
     */
    public function getObsDate(): \DateTime
    {
        return $this->obsDate;
    }

    /**
     * @return null|UploadedFile
     */
    public function getImg(): ?UploadedFile
    {
        return $this->img;
    }
}
