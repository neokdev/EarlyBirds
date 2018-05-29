<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 29/05/2018
 * Time: 13:30
 */

namespace App\Security;

use App\Domain\Models\User;
use App\Domain\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;

class UserHelper
{
    /**
     * @var Security
     */
    private $security;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * UserHelper constructor.
     * @param Security       $security
     * @param UserRepository $userRepository
     */
    public function __construct(
        Security $security,
        UserRepository $userRepository
    ) {
        $this->security       = $security;
        $this->userRepository = $userRepository;
    }
    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->userRepository->findOneBy(['email' => $this->security->getUser()->getEmail()]);
    }
}
