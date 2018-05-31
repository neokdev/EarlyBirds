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
     * ObserveDTO constructor.
     * @param string $author
     * @param $ref
     * @param string $desc
     * @param string $latitude
     * @param string $longitude
     * @param UploadedFile $img
     */
    public function __construct(
        string $author,
        string $ref,
        string $desc,
        string $latitude,
        string $longitude,
        UploadedFile $img

    ) {
        $this->author = $author;
        $this->ref = $ref;
        $this->desc = $desc;
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
     * @return string
     */
    public function getRef(): string
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
     * @return UploadedFile
     */
    public function getImg(): UploadedFile
    {
        return $this->img;
    }

}