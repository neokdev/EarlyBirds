<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 04/06/2018
 * Time: 21:10
 */

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\ObserveBuilderInterface;
use App\Domain\Models\Observe;
use App\Domain\Models\TaxRef;
use App\Domain\Models\User;

/**
 * Class ObserveBuilder
 * @package App\Domain\Builder
 */
class ObserveBuilder implements ObserveBuilderInterface
{
    /**
     * @var Observe
     */
    private $observe;

    /**
     * {@inheritdoc}
     */
    public function create(
        User      $author,
        TaxRef    $ref,
        string    $description,
        string    $latitude,
        string    $longitude,
        \DateTime $date,
        string    $img
    ): ObserveBuilderInterface {
       $this->observe = new Observe();
       $this->observe
            ->setAuthor($author)
            ->setRef($ref)
            ->setDescription($description)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setObsDate($date)
            ->setImg($img)
       ;
       return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getObserve(): Observe
    {
        return $this->observe;
    }
}
