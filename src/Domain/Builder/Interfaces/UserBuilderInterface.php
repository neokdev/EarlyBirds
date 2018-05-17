<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 08/05/2018
 * Time: 00:03
 */

namespace App\Domain\Builder\Interfaces;

use App\Domain\Models\User;

interface UserBuilderInterface
{
    /**
     * @param string   $email
     * @param string   $password
     * @param callable $passwordEncoder
     *
     * @return mixed
     */
    public function createFromRegistration(
        string $email,
        string $password,
        callable $passwordEncoder
    );

    /**
     * @param string   $email
     * @param string   $googleId
     * @param string   $password
     * @param callable $passwordEncoder
     * @param string   $nickname
     * @param string   $firstname
     * @param string   $lastname
     * @param string   $img
     *
     * @return mixed
     */
    public function createFromSocial(
        string $email,
        string $googleId,
        string $password,
        callable $passwordEncoder,
        string $nickname,
        string $firstname,
        string $lastname,
        string $img
    );

    /**
     * @return User
     */
    public function getUser();
}
