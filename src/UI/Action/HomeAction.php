<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 25/04/2018
 * Time: 14:23
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class HomeAction
 *
 * @Route(
 *     "/",
 *     name="app_home",
 *     methods={"GET"}
 * )
 */
final class HomeAction implements HomeActionInterface
{
    /**
     * @param HomeResponderInterface $homeResponder
     *
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $homeResponder)
    {
        return $homeResponder();
    }
}
