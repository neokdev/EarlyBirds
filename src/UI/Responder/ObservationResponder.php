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
use Twig\Environment;

class ObservationResponder implements ObservationResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * ObservationResponder constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @param bool $redirect
     * @param FormInterface|null $addObservationType
     * @return mixed|RedirectResponse|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, FormInterface $addObservationType = null)
    {
        $redirect
            ? $response =  new RedirectResponse('/observe')
            : $response = new Response(
                $this->environment->render('observation.html.twig', [
                    'form' => $addObservationType->createView(),
                ])
        );

        return $response;
    }
}
