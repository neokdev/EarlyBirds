<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 01:12
 */

namespace App\UI\Form\Handler;

use App\UI\Form\Handler\Interfaces\ModifyPasswordTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class ModifyPasswordTypeHandler implements ModifyPasswordTypeHandlerInterface
{

    /**
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            return true;
        }

        return false;
    }
}