<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 00:31
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\ObservationActionInterface;
use App\UI\Responder\Interfaces\ObservationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ObservationAction
 * @Route(
 *     "/observe",
 *     name="app_observe",
 *     methods={"GET"}
 * )
 */
class ObservationAction implements ObservationActionInterface
{
    /**
     * @param ObservationResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(ObservationResponderInterface $responder)
    {
        return $responder();
    }
}
