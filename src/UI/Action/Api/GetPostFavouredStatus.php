<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 21/07/2018
 * Time: 09:41
 */

namespace App\UI\Action\Api;

use App\Domain\Models\Post;
use App\Domain\Models\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class GetPostFoufouredStatus
 * @Route(
 *     "/getfavoured",
 *     name="get_favoured",
 *     methods={"GET"}
 * )
 */
class GetPostFavouredStatus
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * GetPostFoufouredStatus constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke()
    {
        $currentUser = $this->tokenStorage->getToken()->getUser();

        /** @var User $currentUser */
        $favoured = $currentUser->getFavoured()->getValues();

        $status = [];
        /** @var Post $fav */
        foreach ($favoured as $fav) {
            array_push($status, $fav->getId());
        }

        return new JsonResponse($status);
    }
}