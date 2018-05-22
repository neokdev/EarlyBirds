<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:39
 */

namespace App\UI\Action\Interfaces;


use App\UI\Responder\Interfaces\ProfileResponderInterface;

interface ProfileActionInterface
{
    /**
     * @param ProfileResponderInterface $profileResponder
     *
     * @return mixed
     */
    public function __invoke(ProfileResponderInterface $profileResponder);
}
