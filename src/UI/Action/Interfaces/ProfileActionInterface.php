<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:39
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\ProfileResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface ProfileActionInterface
{
    /**
     * @param Request                   $request
     * @param ProfileResponderInterface $profileResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ProfileResponderInterface $profileResponder
    );
}
