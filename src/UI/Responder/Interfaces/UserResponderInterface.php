<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:35
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;

interface UserResponderInterface
{
    /**
     * @param FormInterface $registerType
     * @param               $error
     * @param               $lastEmail
     *
     * @return mixed
     */
    public function __invoke(FormInterface $registerType, $error, $lastEmail);
}
