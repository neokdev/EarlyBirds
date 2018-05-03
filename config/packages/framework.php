<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 03/05/2018
 * Time: 17:36
 */
$container->loadFromExtension('framework', [
    'secret'          => '%env(APP_SECRET)%',
    //'default_locale' => 'en',
    'csrf_protection' => true,
    //'http_method_override' => true,
    //'trusted_hosts' => null,
    // https://symfony.com/doc/current/reference/configuration/framework.html#handler-id
    'session'         => [
        // The native PHP session handler will be used
        'handler_id' => null,
    ],
    //'esi' => null,
    //'fragments' => null,
    'php_errors'      => [
        'log' => true,
    ],
]);
