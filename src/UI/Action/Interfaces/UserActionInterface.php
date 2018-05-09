<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:26
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\UserResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface UserActionInterface
{
    /**
     * @param Request                $request
     * @param UserResponderInterface $responder
     * @return mixed
     */
    public function __invoke(
        Request $request,
        UserResponderInterface $responder
    );
}
