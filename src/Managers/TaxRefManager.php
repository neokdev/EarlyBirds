<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 01/05/2018
 * Time: 08:03
 */

namespace App\Managers;

use App\Repository\TaxRefRepository;

class TaxRefManager
{
    /**
     * @var TaxRefRepository
     */
    private $refRepository;

    /**
     * TaxRefManager constructor.
     * @param TaxRefRepository $refRepository
     */
    public function __construct(
        TaxRefRepository $refRepository
    ) {

        $this->refRepository = $refRepository;
    }

    /**
     * @return array
     */
    public function getVernName()
    {
        $names = $this->refRepository->findAllByNomVern();

        $names = array_column($names, 'nomVern');

        return $names;
    }
}
