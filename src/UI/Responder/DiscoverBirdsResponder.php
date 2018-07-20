<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 17/07/2018
 * Time: 19:01
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\DiscoverBirdsResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class DiscoverBirdsResponder implements DiscoverBirdsResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * DiscoverBirdsResponder constructor.
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
        return new Response($this->twig->render('discoverBirds.html.twig'));
    }
}