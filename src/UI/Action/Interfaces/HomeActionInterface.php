<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 26/04/2018
 * Time: 07:41
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\HomeResponderInterface;

interface HomeActionInterface
{
    /**
     * @param HomeResponderInterface $homeResponder
     *
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $homeResponder);
}