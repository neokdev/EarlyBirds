<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 14/06/2018
 * Time: 13:52
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\UpdateObservationResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface UpdateObservationActionInterface
{
    /**
     * @param Request                             $request
     * @param UpdateObservationResponderInterface $updateObservationResponder
     * @param string                              $id
     *
     * @return mixed
     */
    public function __invoke(
        Request                             $request,
        UpdateObservationResponderInterface $updateObservationResponder,
        string                              $id
    );
}
