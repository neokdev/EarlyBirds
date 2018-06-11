<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 07/06/2018
 * Time: 09:56
 */

namespace App\UI\Action\Interfaces;


use App\Services\Interfaces\SearchBirdsInterface;

interface TaxRefNameActionInterface
{
    public function __invoke(SearchBirdsInterface $searchBirds, string $name);
}