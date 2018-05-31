<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 00:32
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\ObservationResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface ObservationActionInterface
{
    /**
     * @param Request $request
     * @param ObservationResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, ObservationResponderInterface $responder);
}
