<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 03/05/2018
 * Time: 15:25
 */

namespace App\Controller;

use App\Controller\Interfaces\SecurityControllerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

class SecurityController implements SecurityControllerInterface
{
    /**
     * @Route(
     *     "/login",
     *     name="app_login",
     *     methods={"GET"}
     * )
     *
     * @param Environment         $environment
     * @param AuthenticationUtils $authenticationUtils
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return mixed|string
     */
    public function __invoke(
        Environment $environment,
        AuthenticationUtils $authenticationUtils
    ) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastEmail = $authenticationUtils->getLastUsername();

        return new Response(
            $environment->render('security/login.html.twig', [
                'last_email' => $lastEmail,
                'error'      => $error,
            ])
        );
    }
}
