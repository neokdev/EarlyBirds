<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 00:00
 */

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ForgottenPasswordTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function handle(FormInterface $form);
}
