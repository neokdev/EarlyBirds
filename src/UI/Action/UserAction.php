<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:25
 */

namespace App\UI\Action;

use App\Form\UserRegisterType;
use App\UI\Action\Interfaces\UserActionInterface;
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
     * UserAction constructor.
     * @param FormFactoryInterface $factory
     * @param AuthenticationUtils  $authenticationUtils
     */
    public function __construct(
        FormFactoryInterface $factory,
        AuthenticationUtils $authenticationUtils
    ) {
        $this->factory             = $factory;
        $this->authenticationUtils = $authenticationUtils;
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

        return $responder($registerType, $error, $lastEmail);
    }
}
