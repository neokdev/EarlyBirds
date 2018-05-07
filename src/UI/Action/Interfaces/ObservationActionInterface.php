<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 00:32
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\ObservationResponderInterface;

interface ObservationActionInterface
{
    /**
     * @param ObservationResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(ObservationResponderInterface $responder);
}
