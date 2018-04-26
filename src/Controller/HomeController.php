<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 25/04/2018
 * Time: 14:23
 */

namespace App\Controller;

use App\Controller\Interfaces\HomeControllerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController implements HomeControllerInterface
{
    /**
     * @Route(
     *     "/",
     *     name="app_homepage",
     *     methods={"GET"}
     * )
     *
     * @param Environment $environment
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return Response
     */
    public function __invoke(Environment $environment)
    {
        return new Response(
            $environment->render('homepage.html.twig')
        );
    }
}
