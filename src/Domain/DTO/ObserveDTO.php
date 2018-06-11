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

/**
 * Class ObserveDTO
 * @package App\Domain\DTO
 */
class ObserveDTO implements ObserveDTOInterface
{
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
     * @var string
     */
    public $img;

    /**
     * ObserveDTO                   constructor.
     *
     * @param TaxRef                $ref
     * @param string                $description
     * @param string                $latitude
     * @param string                $longitude
     * @param string                $img
     */
    public function __construct(
        TaxRef                      $ref,
        string                      $description,
        string                      $latitude,
        string                      $longitude,
        string                      $img
    ) {
        $this->ref          =       $ref;
        $this->description  =       $description;
        $this->latitude     =       $latitude;
        $this->longitude    =       $longitude;
        $this->img          =       $img;
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
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }
}
