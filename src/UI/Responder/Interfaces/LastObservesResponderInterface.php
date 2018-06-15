<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 15/06/2018
 * Time: 14:07
 */

namespace App\UI\Responder\Interfaces;

interface LastObservesResponderInterface
{
    /**
     * @param array $observes
     *
     * @return mixed
     */
    public function __invoke(array $observes);
}
