<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 14/06/2018
 * Time: 13:52
 */

namespace App\UI\Action;

use App\Domain\DTO\ObserveDTO;
use App\Domain\Repository\ObserveRepository;
use App\UI\Action\Interfaces\UpdateObservationActionInterface;
use App\UI\Form\Handler\Interfaces\UpdateObserveTypeHandlerInterface;
use App\UI\Form\ObserveType;
use App\UI\Responder\Interfaces\UpdateObservationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UpdateObservationAction
 * @package App\UI\Action
 * @Route(
 *     "/modifier-lobservation-{id}",
 *     methods={"GET", "POST"}
 *
 * )
 */
final class UpdateObservationAction implements UpdateObservationActionInterface
{
    /**
     * @var UpdateObserveTypeHandlerInterface
     */
    private $updateObserveTypeHandler;

    /**
     * @var ObserveRepository
     */
    private $observeRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * UpdateObservationAction constructor.
     *
     * @param UpdateObserveTypeHandlerInterface $updateObserveTypeHandler
     * @param ObserveRepository                 $observeRepository
     * @param FormFactoryInterface              $formFactory
     */
    public function __construct(
        UpdateObserveTypeHandlerInterface $updateObserveTypeHandler,
        ObserveRepository                 $observeRepository,
        FormFactoryInterface              $formFactory
    ) {
        $this->updateObserveTypeHandler = $updateObserveTypeHandler;
        $this->observeRepository        = $observeRepository;
        $this->formFactory              = $formFactory;
    }

    /**
     * @param Request                             $request
     * @param UpdateObservationResponderInterface $updateObservationResponder
     * @param string                              $id
     *
     * @return mixed
     */
    public function __invoke(
        Request                             $request,
        UpdateObservationResponderInterface $updateObservationResponder,
        string                              $id
    ) {

        $observe = $this->observeRepository->findOneBy(['id' => $id]);

        $observeDTO = new ObserveDTO(
            $observe->getRef()->getNomComplet(),
            $observe->getDescription(),
            $observe->getLatitude(),
            $observe->getLongitude(),
            null
        );

        $updateObserve = $this->formFactory
            ->create(ObserveType::class, $observeDTO)
            ->handleRequest($request);

        if ($this->updateObserveTypeHandler->handle($updateObserve, $observe)) {
            return $updateObservationResponder(true, $updateObserve);
        }

        return $updateObservationResponder(false, $updateObserve, $observeDTO);
    }
}
