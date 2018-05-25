<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 23/05/2018
 * Time: 13:37
 */

namespace App\UI\Form\Handler;


use App\UI\Form\Handler\Interfaces\ObserveTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class ObserveTypeHandler implements ObserveTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return bool|mixed
     */
    public function Handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            return true;
        }

        return false;
    }
}