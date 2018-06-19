<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 11/06/2018
 * Time: 21:46
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;

/**
 * Interface ContactResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface ContactResponderInterface
{
    /**
     * @param bool               $redirect
     * @param FormInterface|null $form
     *
     * @return mixed
     */
    public function __invoke($redirect = false, FormInterface $form = null);
}
