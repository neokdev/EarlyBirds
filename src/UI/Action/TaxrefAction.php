<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 01/06/2018
 * Time: 10:53
 */

namespace App\UI\Action;

use App\Domain\Repository\TaxRefRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class TaxrefAction
 * @Route(
 *     "/taxref/{id}",
 *     name="taxref",
 *     methods={"GET", "POST"}
 *     )
 */
class TaxrefAction
{
    /**
     * @var TaxRefRepository
     */
    private $taxRefRepository;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * TaxrefAction constructor.
     * @param TaxRefRepository    $taxRefRepository
     * @param SerializerInterface $serializer
     */
    public function __construct(
        TaxRefRepository $taxRefRepository,
        SerializerInterface $serializer
    ) {
        $this->taxRefRepository = $taxRefRepository;
        $this->serializer       = $serializer;
    }

    public function __invoke(Request $request, $id)
    {

        $taxref = $this->taxRefRepository->findByIdToArray($id);

        return JsonResponse::create($taxref[0]);
    }
}
