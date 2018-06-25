<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 17/06/2018
 * Time: 21:16
 */

namespace App\UI\Action\Interfaces;

use App\Services\Interfaces\SearchObservesInterface;

interface MapObservesActionInterface
{
    public function __invoke(SearchObservesInterface $searchObserves);
}
