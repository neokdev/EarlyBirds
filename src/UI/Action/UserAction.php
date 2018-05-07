<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:25
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\UserActionInterface;
use App\UI\Form\Handler\Interfaces\UserRegisterTypeHandlerInterface;
use App\UI\Form\UserRegisterType;
use App\UI\Responder\Interfaces\UserResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class UserAction
 * @Route(
 *     "/login",
 *     name="app_login",
 *     methods={"GET", "POST"}
 * )
 */
class UserAction implements UserActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $factory;
    /**
     * @var AuthenticationUtils
     */
    private $authenticationUtils;
    /**
     * @var UserRegisterTypeHandlerInterface
     */
    private $handler;

    /**
     * UserAction constructor.
     * @param FormFactoryInterface             $factory
     * @param AuthenticationUtils              $authenticationUtils
     * @param UserRegisterTypeHandlerInterface $handler
     */
    public function __construct(
        FormFactoryInterface $factory,
        AuthenticationUtils $authenticationUtils,
        UserRegisterTypeHandlerInterface $handler
    ) {
        $this->factory             = $factory;
        $this->authenticationUtils = $authenticationUtils;
        $this->handler             = $handler;
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
        // get the login error if there is one
        $error = $this->authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastEmail = $this->authenticationUtils->getLastUsername();

        $registerType = $this->factory->create(UserRegisterType::class)
            ->handleRequest($request);

        if ($this->handler->handle($registerType)) {
            // ...
        }

        return $responder($registerType, $error, $lastEmail);
    }
}
