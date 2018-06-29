<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 25/06/2018
 * Time: 22:02
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\ConfidentialityActionInterface;
use App\UI\Responder\Interfaces\ConfidentialityResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ConfidentialityAction
 * @package App\UI\Action
 * @Route(
 *     path="/politique_de_confidentialite",
 *     name="app_confidentiality",
 *     methods={"GET"},
 * )
 */
class ConfidentialityAction implements ConfidentialityActionInterface
{
    /**
     * @var ConfidentialityResponderInterface
     */
    private $confidentialityResponder;

    /**
     * ConfidentialityAction constructor.
     * @param ConfidentialityResponderInterface $confidentialityResponder
     */
    public function __construct(ConfidentialityResponderInterface $confidentialityResponder)
    {
        $this->confidentialityResponder = $confidentialityResponder;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $responder = $this->confidentialityResponder;
        return $responder();
    }
}
