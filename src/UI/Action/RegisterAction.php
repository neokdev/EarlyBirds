<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 23:25
 */

namespace App\UI\Action;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\UI\Action\Interfaces\RegisterActionInterface;
use App\UI\Form\Handler\Interfaces\UserRegisterTypeHandlerInterface;
use App\UI\Form\UserRegisterType;
use App\UI\Responder\Interfaces\UserResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class UserAction
 * @Route(
 *     "/login",
 *     name="app_login",
 *     methods={"GET", "POST"}
 * )
 */
class RegisterAction implements RegisterActionInterface
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
     * RegisterAction constructor.
     * @param EncoderFactoryInterface          $encoder
     * @param UserBuilderInterface             $userBuilder
     * @param FormFactoryInterface             $form
     * @param UserRegisterTypeHandlerInterface $handler
     */
    public function __construct(
        EncoderFactoryInterface $encoder,
        UserBuilderInterface $userBuilder,
        FormFactoryInterface $form,
        UserRegisterTypeHandlerInterface $handler
    ) {
        $this->handler     = $handler;
        $this->encoder     = $encoder;
        $this->userBuilder = $userBuilder;
        $this->form        = $form;
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
        $registerType = $this->factory->create(UserRegisterType::class)
            ->handleRequest($request);

        if ($this->handler->handle($registerType)) {
            $user = $this->userBuilder->createFromRegistration($registerType);
        }

        return $responder($registerType);
    }
}
