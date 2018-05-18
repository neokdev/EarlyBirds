<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:26
 */

namespace App\UI\Action\Security\Interfaces;

use App\UI\Responder\Security\Interfaces\UserResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface UserActionInterface
{
    /**
     * @param Request                $request
     * @param UserResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        UserResponderInterface $responder
    );
}
