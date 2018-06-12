<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:41
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ProfileResponderInterface
{
    /**
     * @param bool          $redirect
     * @param FormInterface $form
     * @param array|null    $observe
     * @param array|null    $users
     *
     * @return mixed
     */
    public function __invoke(
        bool $redirect = false,
        FormInterface $form = null,
        array $observe = null,
        array $users = null
    );
}
