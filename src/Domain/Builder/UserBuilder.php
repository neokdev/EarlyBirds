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
            $passwordEncoder,
            null,
            null,
            null,
            null,
            null
        );

        return $this;
    }

    /**
     * @param string $email
     * @param string $googleId
     * @param string $nickname
     * @param string $firstname
     * @param string $lastname
     * @param string $img
     *
     * @return UserBuilder
     */
    public function createFromGoogle(
        string $email,
        string $googleId,
        string $nickname,
        string $firstname,
        string $lastname,
        string $img
    ): self {
        $this->user = new User(
            $email,
            null,
            null,
            $googleId,
            $nickname,
            $firstname,
            $lastname,
            $img
        );
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
