<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 12/05/2018
 * Time: 18:00
 */

namespace App\Listener;

use App\Event\UserRegisteredEvent;

class UserRegisteredListener
{
    /**
     * @param UserRegisteredEvent $event
     */
    public function onUserRegistered(UserRegisteredEvent $event)
    {
        // Logging
    }
}
