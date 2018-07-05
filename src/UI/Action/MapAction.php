<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 16/06/2018
 * Time: 21:12
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\MapActionInterface;
use App\UI\Responder\Interfaces\MapResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MapAction
 * @package App\UI\Action
 * @Route(
 *     "/carte",
 *     name="app_map",
 *     methods={"GET"}
 * )
 */
class MapAction implements MapActionInterface
{
    public function __invoke(MapResponderInterface $mapResponder)
    {
        return $mapResponder();
    }
}
