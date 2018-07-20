<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 17/07/2018
 * Time: 19:00
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\DiscoverBirdsActionInterface;
use App\UI\Responder\Interfaces\DiscoverBirdsResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     path="/reconnaitre-les-oiseaux",
 *     name="app_discover_birds",
 *     methods={"GET"}
 *     )
 * Class DiscoverBirdsAction
 * @package App\UI\Action
 *
 */
class DiscoverBirdsAction implements DiscoverBirdsActionInterface
{
    /**
     * @var DiscoverBirdsResponderInterface
     */
    private $discoverResponder;

    /**
     * DiscoverBirdsAction constructor.
     * @param DiscoverBirdsResponderInterface $discoverResponder
     */
    public function __construct(DiscoverBirdsResponderInterface $discoverResponder)
    {
        $this->discoverResponder = $discoverResponder;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $responder = $this->discoverResponder;
        return $responder();
    }
}