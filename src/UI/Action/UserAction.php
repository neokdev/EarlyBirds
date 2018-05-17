<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:25
 */

namespace App\UI\Action;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Security\Guard\LoginFormAuthenticator;
use App\UI\Action\Interfaces\UserActionInterface;
use App\UI\Form\Handler\Interfaces\LoginTypeHandlerInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Form\LoginType;
use App\UI\Form\RegisterType;
use App\UI\Responder\Interfaces\UserResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

/**
 * Class UserAction
 * @Route(
 *     "/login",
 *     name="security_login",
 *     methods={"GET", "POST"}
 * )
 */
final class UserAction implements UserActionInterface
{
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
     * @var GuardAuthenticatorHandler
     */
    private $handler;
    /**
     * @var AuthenticatorInterface
     */
    private $authenticator;

    /**
     * UserAction constructor.
     * @param UserBuilderInterface         $userBuilder
     * @param FormFactoryInterface         $form
     * @param LoginTypeHandlerInterface    $loginTypeHandler
     * @param RegisterTypeHandlerInterface $registerTypeHandler
     * @param GuardAuthenticatorHandler    $handler
     * @param LoginFormAuthenticator       $authenticator
     */
    public function __construct(
        UserBuilderInterface $userBuilder,
        FormFactoryInterface $form,
        LoginTypeHandlerInterface $loginTypeHandler,
        RegisterTypeHandlerInterface $registerTypeHandler,
        GuardAuthenticatorHandler $handler,
        LoginFormAuthenticator $authenticator
    ) {
        $this->userBuilder         = $userBuilder;
        $this->form                = $form;
        $this->loginTypeHandler    = $loginTypeHandler;
        $this->registerTypeHandler = $registerTypeHandler;
        $this->handler             = $handler;
        $this->authenticator       = $authenticator;
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

        // Automatically Login after Registration
        if ($this->registerTypeHandler->handle($registerType)) {
            return $this->handler->authenticateUserAndHandleSuccess(
                $this->userBuilder->getUser(),
                $request,
                $this->authenticator,
                'doctrine'
            );
        }

        if ($this->loginTypeHandler->handle($loginType)) {
            return $responder(true);
        }

        return $responder(false, $loginType, $registerType);
    }
}
