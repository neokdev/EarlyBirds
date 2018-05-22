<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 01:12
 */

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ModifyPasswordTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function handle(FormInterface $form);
}
