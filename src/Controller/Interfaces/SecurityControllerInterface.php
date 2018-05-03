<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 03/05/2018
 * Time: 15:27
 */

namespace App\Controller\Interfaces;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

interface SecurityControllerInterface
{
    /**
     * @param Environment         $environment
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return mixed
     */
    public function __invoke(
        Environment $environment,
        AuthenticationUtils $authenticationUtils
    );
}
