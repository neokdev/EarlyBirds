<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 26/06/2018
 * Time: 00:01
 */

namespace App\UI\Action\Api;

use App\Domain\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UpgradeUser
 * @Route(
 *     "/upgradeuser/{id}",
 *     name="upgrade_user",
 *     methods={"POST"}
 * )
 */
class UpgradeUser
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * DeleteUser constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param user Id $id
     *
     * @return JsonResponse
     */
    public function __invoke($id)
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        $user->addRole("ROLE_NATURALIST");
        $status = $this->userRepository->update();

        return new JsonResponse($status);
    }
}
