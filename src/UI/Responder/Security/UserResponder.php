<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:32
 */

namespace App\UI\Responder\Security;

use App\UI\Responder\Security\Interfaces\UserResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

final class UserResponder implements UserResponderInterface
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
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * HomeResponder constructor.
     * @param Environment           $environment
     * @param AuthenticationUtils   $authenticationUtils
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment $environment,
        AuthenticationUtils $authenticationUtils,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->environment         = $environment;
        $this->authenticationUtils = $authenticationUtils;
        $this->urlGenerator        = $urlGenerator;
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
            $response = new RedirectResponse($this->urlGenerator->generate('app_profile'));
        } else {
            $response = new Response(
                $this->environment->render(
                    'Security/login.html.twig',
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
