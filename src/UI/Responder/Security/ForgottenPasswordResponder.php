<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 13:38
 */

namespace App\UI\Responder\Security;

use App\UI\Responder\Security\Interfaces\ForgottenPasswordResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class ForgottenPasswordResponder implements ForgottenPasswordResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * ForgottenPasswordResponder constructor.
     * @param Environment           $environment
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment $environment,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->environment  = $environment;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param bool               $redirect
     * @param FormInterface|null $form
     *
     * @return mixed|RedirectResponse|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        bool $redirect,
        FormInterface $form = null
    ) {
        if ($redirect) {
            $response = new RedirectResponse($this->urlGenerator->generate('security_login'));
        } else {
            $response = new Response(
                $this->environment->render('Security/forgottenPassword.html.twig', [
                    'form' => $form->createView(),
                ])
            );
        }

        return $response;
    }
}
