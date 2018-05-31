<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 09/05/2018
 * Time: 15:04
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ObserveDTOInterface;
use App\Domain\Models\TaxRef;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ObserveDTO implements ObserveDTOInterface
{
    /**
     * @var string
     */
    public $author;

    /**
     * @var TaxRef
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
     * @var UploadedFile
     */
    public $img;

    /**
     * ObserveDTO constructor.
     * @param string $author
     * @param TaxRef $ref
     * @param string $description
     * @param string $latitude
     * @param string $longitude
     * @param UploadedFile $img
     */
    public function __construct(
        string $author,
        TaxRef $ref,
        string $description,
        string $latitude,
        string $longitude,
        UploadedFile $img
    ) {
        $this->author = $author;
        $this->ref = $ref;
        $this->description = $description;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->img = $img;
    }


    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return TaxRef
     */
    public function getRef(): TaxRef
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
     * @return UploadedFile
     */
    public function getImg(): UploadedFile
    {
        return $this->img;
    }

}