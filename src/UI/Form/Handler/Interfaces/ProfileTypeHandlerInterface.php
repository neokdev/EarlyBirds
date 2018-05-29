<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/05/2018
 * Time: 10:45
 */

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ProfileTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function handle(FormInterface $form);
}
