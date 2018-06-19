<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 16/06/2018
 * Time: 21:11
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\MapResponderInterface;

/**
 * Interface MapActionInterface
 * @package App\UI\Action\Interfaces
 */
interface MapActionInterface
{
    public function __invoke(MapResponderInterface $mapResponder);
}
