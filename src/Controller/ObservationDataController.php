<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 02/05/2018
 * Time: 22:28
 */

namespace App\Controller;

use App\Controller\Interfaces\ObservationDataControllerInterface;
use App\Managers\TaxRefManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ObservationDataController implements ObservationDataControllerInterface
{
    /**
     * @Route(
     *     "/observeData",
     *     name="observeData",
     *     methods={"POST"}
     * )
     * @param TaxRefManager $manager
     *
     * @return JsonResponse
     */
    public function __invoke(TaxRefManager $manager)
    {
        $names = $manager->getVernName();

        return new JsonResponse($names);
    }
}
