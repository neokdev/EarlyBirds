<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 13:37
 */

namespace App\UI\Action\Security;

use App\UI\Action\Security\Interfaces\ForgottenPasswordActionInterface;
use App\UI\Form\ForgottenPasswordType;
use App\UI\Form\Handler\Interfaces\ForgottenPasswordTypeHandlerInterface;
use App\UI\Responder\Security\Interfaces\ForgottenPasswordResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

/**
 * Class ForgottenPasswordAction
 * @Route(
 *     "/forgottenpassword",
 *     name="security_forgottenpassword",
 *     methods={"GET", "POST"}
 * )
 */
final class ForgottenPasswordAction implements ForgottenPasswordActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $form;
    /**
     * @var ForgottenPasswordTypeHandlerInterface
     */
    private $typeHandler;

    /**
     * ForgottenPasswordAction constructor.
     * @param FormFactoryInterface                  $form
     * @param ForgottenPasswordTypeHandlerInterface $typeHandler
     */
    public function __construct(
        FormFactoryInterface $form,
        ForgottenPasswordTypeHandlerInterface $typeHandler
    ) {
        $this->form        = $form;
        $this->typeHandler = $typeHandler;
    }

    /**
     * @param Request                             $request
     * @param ForgottenPasswordResponderInterface $forgottenPassword
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ForgottenPasswordResponderInterface $forgottenPassword
    ) {
        $forgottenPasswordForm = $this->form->create(ForgottenPasswordType::class)
            ->handleRequest($request);

        if ($this->typeHandler->handle($forgottenPasswordForm)) {
            return $forgottenPassword(true);
        }

        return $forgottenPassword(false, $forgottenPasswordForm);
    }
}
