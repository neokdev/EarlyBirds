<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 12/05/2018
 * Time: 17:38
 */

namespace App\Event;

use App\Domain\Models\User;
use Symfony\Component\EventDispatcher\Event;

class UserRegisteredEvent extends Event
{
    const NAME = 'user.registered';

    /**
     * @var User
     */
    private $user;

    /**
     * UserRegisteredEvent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
