<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 02/05/2018
 * Time: 22:31
 */

namespace App\Controller\Interfaces;

use App\Managers\TaxRefManager;

interface ObservationDataControllerInterface
{
    /**
     * @param TaxRefManager $manager
     *
     * @return mixed
     */
    public function __invoke(TaxRefManager $manager);
}
