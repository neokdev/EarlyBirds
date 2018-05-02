<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/04/2018
 * Time: 07:54
 */

namespace App\Controller;

use App\Controller\Interfaces\ObservationControllerInterface;
use App\Managers\TaxRefManager;
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
     * @param TaxRefManager $manager
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        Environment $environment,
        TaxRefManager $manager
    ) {
        $names = $manager->getVernName();

        dump(json_encode($names, JSON_HEX_QUOT));

        return new Response
        (
            $environment->render
            ('obsvervation.html.twig',
                [
                    'names' => json_encode($names, JSON_HEX_QUOT),
                ]
            )
        );
    }
}
