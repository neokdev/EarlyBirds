<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 01/06/2018
 * Time: 10:53
 */

namespace App\UI\Action;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TaxrefAction
 * @Route(
 *     "/gettaxref/",
 *     methods={"GET", "POST"}
 *     )
 */
class TaxrefAction
{
    /**
     * @return JsonResponse
     */
    public function __invoke()
    {

        $file = new File('../src\Domain\Models\TAXREF.json');

        $taxref = file_get_contents($file);

        return new JsonResponse($taxref);
    }
}
