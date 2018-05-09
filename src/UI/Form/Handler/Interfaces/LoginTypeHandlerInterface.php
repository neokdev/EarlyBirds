<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 09/05/2018
 * Time: 16:38
 */

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface LoginTypeHandlerInterface
{
    /**
     * @param FormInterface $loginForm
     *
     * @return mixed
     */
    public function handle(FormInterface $loginForm);
}
