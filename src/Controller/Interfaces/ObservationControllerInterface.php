<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/04/2018
 * Time: 09:39
 */

namespace App\Controller\Interfaces;

use Twig\Environment;

interface ObservationControllerInterface
{
    /**
     * @param Environment $environment
     *
     * @return mixed
     */
    public function __invoke(Environment $environment);
}
