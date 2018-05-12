<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:25
 */

namespace App\UI\Action;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\UI\Action\Interfaces\UserActionInterface;
use App\UI\Form\Handler\Interfaces\LoginTypeHandlerInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Form\LoginType;
use App\UI\Form\RegisterType;
use App\UI\Responder\Interfaces\UserResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserAction
 * @Route(
 *     "/login",
 *     name="security_login",
 *     methods={"GET", "POST"}
 * )
 */
class UserAction implements UserActionInterface
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;
    /**
     * @var UserBuilderInterface
     */
    private $userBuilder;
    /**
     * @var FormFactoryInterface
     */
    private $form;
    /**
     * @var LoginTypeHandlerInterface
     */
    private $loginTypeHandler;
    /**
     * @var RegisterTypeHandlerInterface
     */
    private $registerTypeHandler;

    /**
     * UserAction constructor.
     * @param EncoderFactoryInterface      $encoder
     * @param UserBuilderInterface         $userBuilder
     * @param FormFactoryInterface         $form
     * @param LoginTypeHandlerInterface    $loginTypeHandler
     * @param RegisterTypeHandlerInterface $registerTypeHandler
     */
    public function __construct(
        EncoderFactoryInterface $encoder,
        UserBuilderInterface $userBuilder,
        FormFactoryInterface $form,
        LoginTypeHandlerInterface $loginTypeHandler,
        RegisterTypeHandlerInterface $registerTypeHandler
    ) {
        $this->encoder             = $encoder;
        $this->userBuilder         = $userBuilder;
        $this->form                = $form;
        $this->loginTypeHandler    = $loginTypeHandler;
        $this->registerTypeHandler = $registerTypeHandler;
    }

    /**
     * @param Request                $request
     * @param UserResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        UserResponderInterface $responder
    ) {
        $loginType = $this->form->create(LoginType::class)
            ->handleRequest($request);

        $registerType = $this->form->create(RegisterType::class)
            ->handleRequest($request);

        if ($this->loginTypeHandler->handle($loginType) || $this->registerTypeHandler->handle($registerType)) {
            return $responder(true);
        }

        return $responder(false, $loginType, $registerType);
    }
}
