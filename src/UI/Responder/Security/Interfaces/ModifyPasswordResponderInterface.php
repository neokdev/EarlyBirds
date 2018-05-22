<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 00:37
 */

namespace App\UI\Responder\Security\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ModifyPasswordResponderInterface
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
