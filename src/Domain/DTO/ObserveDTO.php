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

/**
 * Class ObserveDTO
 * @package App\Domain\DTO
 */
class ObserveDTO implements ObserveDTOInterface
{
    /**
     * @var string
     */
    public $ref;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $latitude;

    /**
     * @var string
     */
    public $longitude;

    /**
     * @var \DateTime
     */
    public $obsDate;

    /**
     * @var UploadedFile
     */
    public $img;

    /**
     * ObserveDTO constructor.
     *
     * @param string            $ref
     * @param string            $description
     * @param string            $latitude
     * @param string            $longitude
     * @param \DateTime         $date
     * @param UploadedFile|null $img
     */
    public function __construct(
        string       $ref,
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
