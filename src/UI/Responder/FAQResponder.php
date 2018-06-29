<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 25/06/2018
 * Time: 21:37
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\FAQResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class FAQResponder implements FAQResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * FAQResponder constructor.
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
        $response = new Response($this->twig->render('faq.html.twig'));
        return $response;
    }
}