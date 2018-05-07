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
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UserResponder implements UserResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * HomeResponder constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @param FormInterface $registerType
     * @param               $error
     * @param               $lastEmail
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return mixed|Response
     */
    public function __invoke(
        FormInterface $registerType,
        $error,
        $lastEmail
    ) {
        return new Response(
            $this->environment->render(
                'login.html.twig',
                [
                    'form'       => $registerType->createView(),
                    'last_email' => $lastEmail,
                    'error'      => $error,
                ]
            )
        );
    }
}
