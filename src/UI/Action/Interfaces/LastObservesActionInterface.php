<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 15/06/2018
 * Time: 14:09
 */

namespace App\UI\Action\Interfaces;

use App\UI\Responder\Interfaces\LastObservesResponderInterface;

interface LastObservesActionInterface
{
    /**
     * @param LastObservesResponderInterface $lastObservesResponder
     *
     * @return mixed
     */
    public function __invoke(LastObservesResponderInterface $lastObservesResponder);
}
