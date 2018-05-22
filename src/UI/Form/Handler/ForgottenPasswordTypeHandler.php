<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 23:56
 */

namespace App\UI\Form\Handler;

use App\UI\Form\Handler\Interfaces\ForgottenPasswordTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class ForgottenPasswordTypeHandler implements ForgottenPasswordTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            return true;
        }

        return false;
    }
}
