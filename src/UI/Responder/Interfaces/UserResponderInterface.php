<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:35
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;

interface UserResponderInterface
{
    /**
     * @param bool          $redirect
     * @param FormInterface $login
     * @param FormInterface $registerType
     *
     * @return mixed
     */
    public function __invoke(
        bool $redirect,
        FormInterface $login,
        FormInterface $registerType
    );
}
