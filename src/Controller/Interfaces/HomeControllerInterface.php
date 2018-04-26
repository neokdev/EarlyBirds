<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 26/04/2018
 * Time: 07:41
 */

namespace App\Controller\Interfaces;

use Twig\Environment;

interface HomeControllerInterface
{
    /**
     * @param Environment $environment
     *
     * @return mixed
     */
    public function __invoke(Environment $environment);
}