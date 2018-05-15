<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 14:07
 */

namespace App\UI\Action\Social\Interfaces;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Component\HttpFoundation\Request;

interface GoogleCheckActionInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request);
}
