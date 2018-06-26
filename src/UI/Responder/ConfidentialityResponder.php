<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 25/06/2018
 * Time: 22:03
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ConfidentialityResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ConfidentialityResponder implements ConfidentialityResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ConfidentialityResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        $response = new Response($this->twig->render('confidentiality.html.twig'));
        return $response;
    }
}
