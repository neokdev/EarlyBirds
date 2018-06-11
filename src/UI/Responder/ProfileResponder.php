<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:40
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ProfileResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class ProfileResponder implements ProfileResponderInterface
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
     * ProfileResponder constructor.
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
     * @return mixed|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        bool $redirect = false,
        FormInterface $form = null,
        array $observe = null
    ) {
        if ($redirect) {
            $response = new RedirectResponse($this->urlGenerator->generate('app_profile'));
        } else {
            $response = new Response(
                $this->environment->render(
                    'profile.html.twig',
                    [
                        'form'     => $form->createView(),
                        'observes' => $observe,
                    ]
                )
            );
        }

        return $response;
    }
}
