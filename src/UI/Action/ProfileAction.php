<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:37
 */

namespace App\UI\Action;

use App\Domain\Repository\ObserveRepository;
use App\UI\Action\Interfaces\ProfileActionInterface;
use App\UI\Form\Handler\Interfaces\ProfileTypeHandlerInterface;
use App\UI\Form\ProfileType;
use App\UI\Responder\Interfaces\ProfileResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class ProfileAction
 * @Route(
 *     "/profile",
 *     name="app_profile",
 *     methods={"GET", "POST"}
 * )
 */
final class ProfileAction implements ProfileActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $form;
    /**
     * @var ProfileTypeHandlerInterface
     */
    private $typeHandler;
    /**
     * @var ObserveRepository
     */
    private $observeRepository;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * ProfileAction constructor.
     * @param FormFactoryInterface        $form
     * @param ProfileTypeHandlerInterface $typeHandler
     * @param ObserveRepository           $observeRepository
     * @param TokenStorageInterface       $tokenStorage
     */
    public function __construct(
        FormFactoryInterface $form,
        ProfileTypeHandlerInterface $typeHandler,
        ObserveRepository $observeRepository,
        TokenStorageInterface $tokenStorage
    ) {
        $this->form              = $form;
        $this->typeHandler       = $typeHandler;
        $this->observeRepository = $observeRepository;
        $this->tokenStorage      = $tokenStorage;
    }
    /**
     * @param Request                   $request
     * @param ProfileResponderInterface $profileResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ProfileResponderInterface $profileResponder
    ) {
        $user = $this->tokenStorage->getToken()->getUser();

        $userId = $user->getId();

        $myObserves = $this->observeRepository->findMyObservationsByOrderDesc($userId);

        $profileType = $this->form->create(ProfileType::class)
            ->handleRequest($request);

        if ($this->typeHandler->handle($profileType)) {
            return $profileResponder(true);
        }

        return $profileResponder(false, $profileType, $myObserves);
    }
}
