<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 07/06/2018
 * Time: 11:09
 */

namespace App\Services;

use App\Domain\Repository\TaxRefRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchBirds
{
    /**
     * @var TaxRefRepository
     */
    private $taxRefRepository;

    /**
     * SearchBirds constructor.
     * @param TaxRefRepository $taxRefRepository
     */
    public function __construct(TaxRefRepository $taxRefRepository)
    {
        $this->taxRefRepository = $taxRefRepository;
    }

    public function __invoke($name)
    {
        $birdsName = $this->taxRefRepository->searchName($name);

        $response = new JsonResponse();
        $response->setData($birdsName);

        return $response;
    }
}
