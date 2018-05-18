<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 15:08
 */

namespace App\UI\Action\Security\Interfaces;

use App\UI\Responder\Security\Interfaces\ForgottenPasswordResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface ForgottenPasswordActionInterface
{
    /**
     * @param Request                             $request
     * @param ForgottenPasswordResponderInterface $forgottenPassword
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ForgottenPasswordResponderInterface $forgottenPassword
    );
}
