<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 14:10
 */

namespace App\UI\Action\Social\Interfaces;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;

interface FacebookConnectActionInterface
{
    /**
     * @param ClientRegistry $registry
     *
     * @return mixed
     */
    public function __invoke(ClientRegistry $registry);
}
