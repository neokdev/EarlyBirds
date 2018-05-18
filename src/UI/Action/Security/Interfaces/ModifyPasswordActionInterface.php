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
     * @param Request                          $request
     * @param ModifyPasswordResponderInterface $responder
     */
    public function __invoke(
        Request $request,
        ModifyPasswordResponderInterface $responder
    );
}
