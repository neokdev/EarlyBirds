<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 25/06/2018
 * Time: 21:54
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\LegalResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class LegalResponder
 * @package App\UI\Responder
 */
class LegalResponder implements LegalResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * LegalResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        $response = new Response($this->twig->render('legal.html.twig'));
        return $response;
    }
}
