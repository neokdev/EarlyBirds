<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 00:33
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;

interface ObservationResponderInterface
{
    /**
     * @param bool $redirect
     * @param FormInterface $addObservationType
     * @return mixed
     */
    public function __invoke($redirect, FormInterface $addObservationType);
}
