<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 28/05/2018
 * Time: 18:22
 */

namespace App\Services\Interfaces;

use App\Domain\Models\User;

interface MailerInterface
{
    /**
     * @param User $user
     *
     * @return mixed
     */
    public function sendWelcome(User $user);

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function sendResetPasswordTokenLink(User $user);
}
