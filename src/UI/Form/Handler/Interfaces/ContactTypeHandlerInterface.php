<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 12/06/2018
 * Time: 09:36
 */

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ContactTypeHandlerInterface
{
    public function handle(FormInterface $form);
}
