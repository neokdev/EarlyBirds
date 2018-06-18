<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/06/2018
 * Time: 17:37
 */

namespace App\UI\Action\Api;

use App\Domain\Models\Observe;
use App\Domain\Models\User;
use App\Domain\Repository\ObserveRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class GetObserveLikeStatus
 * @Route(
 *     "/lastobserve/heart",
 *     name="get_observe_like_status",
 *     methods={"GET"}
 * )
 */
class GetObserveLikeStatus
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var ObserveRepository
     */
    private $observeRepository;

    /**
     * ToggleObserveLike constructor.
     * @param ObserveRepository     $observeRepository
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        ObserveRepository $observeRepository,
        TokenStorageInterface $tokenStorage
    ) {
        $this->tokenStorage      = $tokenStorage;
        $this->observeRepository = $observeRepository;
    }
    /**
     * @param Observe $id
     *
     * @return JsonResponse
     */
    public function __invoke()
    {
        $currentUser = $this->tokenStorage->getToken()->getUser();

        /** @var User $currentUser */
        $upvotes = $currentUser->getUpvoted()->getValues();

        $status = [];
        foreach ($upvotes as $upvote) {
            array_push($status, $upvote->getId());
        }

        return new JsonResponse($status);
    }
}