<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 07/05/2018
 * Time: 23:57
 */

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Domain\Models\User;

class UserBuilder implements UserBuilderInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * @param string   $email
     * @param string   $password
     * @param callable $passwordEncoder
     *
     * @return UserBuilder
     */
    public function createFromRegistration(
        string $email,
        string $password,
        callable $passwordEncoder
    ):self {
        $this->user = new User(
            $email,
            $password,
            $passwordEncoder
        );

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
