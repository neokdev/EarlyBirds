<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:32
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\UserResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

class UserResponder implements UserResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var AuthenticationUtils
     */
    private $authenticationUtils;

    /**
     * HomeResponder constructor.
     * @param Environment         $environment
     * @param AuthenticationUtils $authenticationUtils
     */
    public function __construct(
        Environment $environment,
        AuthenticationUtils $authenticationUtils
    ) {
        $this->environment         = $environment;
        $this->authenticationUtils = $authenticationUtils;
    }

    /**
     * @param bool               $redirect
     * @param FormInterface|null $login
     * @param FormInterface|null $registerType
     *
     * @return mixed|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        bool $redirect = false,
        FormInterface $login = null,
        FormInterface $registerType = null
    ) {
        if ($redirect) {
            $response = new RedirectResponse('/profile');
        } else {
            $response = new Response(
                $this->environment->render(
                    'login.html.twig',
                    [
                        'login_form'    => $login->createView(),
                        'register_form' => $registerType->createView(),
                        'error'         => $this->authenticationUtils->getLastAuthenticationError(),
                    ]
                )
            );
        }

        return $response;
    }
}
