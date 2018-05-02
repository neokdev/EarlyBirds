<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/04/2018
 * Time: 09:39
 */

namespace App\Controller\Interfaces;

use App\Managers\TaxRefManager;
use Twig\Environment;

interface ObservationControllerInterface
{
    /**
     * @param Environment   $environment
     * @param TaxRefManager $manager
     *
     * @return mixed
     */
    public function __invoke(
        Environment $environment,
        TaxRefManager $manager
    );
}
