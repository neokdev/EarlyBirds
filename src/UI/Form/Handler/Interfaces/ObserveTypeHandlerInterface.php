<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 23/05/2018
 * Time: 12:28
 */

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ObserveTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function Handle(FormInterface $form);
}