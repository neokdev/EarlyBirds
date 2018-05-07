<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 01:21
 */

namespace App\UI\Form\Handler;

use App\UI\Form\Handler\Interfaces\UserRegisterTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class UserRegisterTypeHandler implements UserRegisterTypeHandlerInterface
{
    /**
     * @param FormInterface $registerType
     *
     * @return bool
     */
    public function handle(FormInterface $registerType): bool
    {
        if ($registerType->isSubmitted() && $registerType->isValid()) {
            $data = new $registerType->getData(); // Instance de UserRegisterDTO -> hydraté
            // .. Doctrine
            return true;
        }

        return false;
    }
}
