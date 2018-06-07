<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 07/06/2018
 * Time: 11:09
 */

namespace App\Services\Interfaces;


interface SearchBirdsInterface
{
    public function __invoke(string $name);

}