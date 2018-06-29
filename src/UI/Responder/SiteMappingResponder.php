<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 25/06/2018
 * Time: 21:47
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\SiteMappingResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class SiteMappingResponder implements SiteMappingResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * SiteMappingResponder constructor.
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
        $response = new Response($this->twig->render('siteMapping.html.twig'));
        return $response;
    }
}