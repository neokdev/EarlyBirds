<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 04/06/2018
 * Time: 21:10
 */

namespace App\Domain\Builder\Interfaces;


use App\Domain\Models\Observe;
use App\Domain\Models\TaxRef;
use App\Domain\Models\User;
use GuzzleHttp\Psr7\UploadedFile;

/**
 * Interface ObserveBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface ObserveBuilderInterface
{
    /**
     * @param               User                            $author
     * @param               TaxRef                          $ref
     * @param               string                          $description
     * @param               string                          $latitude
     * @param               string                          $longitude
     * @param               string                          $img
     *
     * @return              ObserveBuilderInterface
     */
    public function create(
        User                $author,
        TaxRef              $ref,
        string              $description,
        string              $latitude,
        string              $longitude,
        string              $img
    ):self;

    /**
     * @return Observe
     */
    public function getObserve(): Observe;

}