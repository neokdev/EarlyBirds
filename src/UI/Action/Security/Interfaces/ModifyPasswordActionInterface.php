<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 00:35
 */

namespace App\UI\Action\Security\Interfaces;

use App\UI\Responder\Security\Interfaces\ModifyPasswordResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface ModifyPasswordActionInterface
{
    /**
     * @param string                           $token
     * @param Request                          $request
     * @param ModifyPasswordResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        $token,
        Request $request,
        ModifyPasswordResponderInterface $responder
    );
}
