<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 03/05/2018
 * Time: 13:37
 */

$container->loadFromExtension('security', [
    'providers'      => [
        'in_memory' => [
            'memory' => null,
        ],
    ],
    'firewalls'      => [
        'dev'  => [
            'pattern'  => '^/(_(profiler|wdt)|css|images|js)/',
            'security' => false,
        ],
        'main' => [
            'anonymous'  => null,
            'form_login' => [
                'login_path' => 'login',
                'check_path' => 'login',
            ],
        ],
    ],
    'access_control' => [
        // require ROLE_ADMIN for /admin*
        ['path' => '^/admin', 'roles' => 'ROLE_ADMIN'],
        ['path' => '^/profile', 'roles' => 'ROLE_USER'],
    ],
]);
