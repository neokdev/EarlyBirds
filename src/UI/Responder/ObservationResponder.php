<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 00:39
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ObservationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class ObservationResponder implements ObservationResponderInterface
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
     * ObservationResponder constructor.
     * @param Environment $environment
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment $environment,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->environment = $environment;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param  bool                                 $redirect
     * @param  FormInterface|null                   $addObservationType
     *
     * @return mixed|RedirectResponse|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        $redirect = false,
        FormInterface $addObservationType = null
    ) {
        $redirect
            ? $response =  new RedirectResponse($this->urlGenerator->generate('app_home'))
            : $response = new Response(
                $this->environment->render('observation.html.twig', [
                    'form' => $addObservationType->createView(),
                ])
        );

        return $response;
    }
}
