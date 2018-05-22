<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:37
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\ProfileActionInterface;
use App\UI\Responder\Interfaces\ProfileResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ProfileAction
 * @Route(
 *     "/profile",
 *     name="app_profile",
 *     methods={"GET"}
 * )
 */
final class ProfileAction implements ProfileActionInterface
{
    /**
     * @param ProfileResponderInterface $profileResponder
     *
     * @return mixed
     */
    public function __invoke(ProfileResponderInterface $profileResponder)
    {
        return $profileResponder();
    }
}
