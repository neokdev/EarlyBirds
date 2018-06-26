<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 25/06/2018
 * Time: 21:45
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\SiteMappingActionInterface;
use App\UI\Responder\Interfaces\SiteMappingResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class SiteMappingAction
 * @package App\UI\Action
 * @Route(
 *     path="/plan_du_site",
 *     name="app_site_mapping",
 *     methods={"GET"}
 * )
 */
class SiteMappingAction implements SiteMappingActionInterface
{
    /**
     * @var SiteMappingResponderInterface
     */
    private $sietMappingResponder;

    /**
     * SiteMappingAction constructor.
     * @param SiteMappingResponderInterface $sitMappingResponder
     */
    public function __construct(SiteMappingResponderInterface $siteMappingResponder)
    {
        $this->siteMappingResponder = $siteMappingResponder;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $responder = $this->siteMappingResponder;
        return $responder();
    }
}
