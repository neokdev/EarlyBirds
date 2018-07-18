<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 14:26
 */

namespace App\UI\Responder\Interfaces;


interface ActualityResponderInterface
{
    public function __invoke($post);
}