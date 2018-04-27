<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/04/2018
 * Time: 07:54
 */

namespace App\Controller;

use App\Controller\Interfaces\ObservationControllerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ObservationController implements ObservationControllerInterface
{
    /**
     * @Route(
     *     "/observe",
     *     name="app_observe",
     *     methods={"GET"},
     * )
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
            $environment->render('obsvervation.html.twig')
        );
    }
}
