<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 17/06/2018
 * Time: 20:56
 */

namespace App\UI\Action\Api;

use App\Domain\Repository\ObserveRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GetValidateObservesTaxrefNames
 * @Route(
 *     "/getvalidateobservestaxrefnames",
 *     name="json_getvalidateobservestaxrefnames",
 *     methods={"GET"}
 * )
 */
class GetValidateObservesTaxrefNames
{
    /**
     * @var ObserveRepository
     */
    private $observeRepository;

    /**
     * GetValidateObservesTaxrefNames constructor.
     * @param ObserveRepository $observeRepository
     */
    public function __construct(ObserveRepository $observeRepository)
    {
        $this->observeRepository = $observeRepository;
    }

    public function __invoke()
    {
        $observes = $this->observeRepository->findValidate();

        $autocomplete = [];
        /** @var Observe $observes */
        foreach ($observes as $observe) {
            /** @var Observe $observe */
            $autocomplete[$observe->getRef()->getNomVern()] = null;
            $autocomplete[$observe->getRef()->getLbNom()]   = null;
        }

        return new JsonResponse($autocomplete);
    }
}
