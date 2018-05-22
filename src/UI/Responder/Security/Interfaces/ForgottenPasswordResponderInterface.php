<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 13:39
 */

namespace App\UI\Responder\Security\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ForgottenPasswordResponderInterface
{
    /**
     * @param bool               $redirect
     * @param FormInterface|null $form
     *
     * @return mixed
     */
    public function __invoke(
        bool $redirect,
        FormInterface $form = null
    );
}
