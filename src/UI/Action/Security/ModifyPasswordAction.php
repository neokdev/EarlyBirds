<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 00:34
 */

namespace App\UI\Action\Security;

use App\UI\Action\Security\Interfaces\ModifyPasswordActionInterface;
use App\UI\Form\Handler\Interfaces\ModifyPasswordTypeHandlerInterface;
use App\UI\Form\ModifyPasswordType;
use App\UI\Responder\Security\Interfaces\ModifyPasswordResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ModifyPasswordAction
 * @Route(
 *     "/modifypassword/{token}",
 *     name="security_modifyPassword",
 *     methods={"GET", "POST"}
 * )
 */
final class ModifyPasswordAction implements ModifyPasswordActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $form;
    /**
     * @var ModifyPasswordTypeHandlerInterface
     */
    private $typeHandler;

    /**
     * ModifyPasswordAction constructor.
     * @param FormFactoryInterface               $form
     * @param ModifyPasswordTypeHandlerInterface $typeHandler
     */
    public function __construct(
        FormFactoryInterface $form,
        ModifyPasswordTypeHandlerInterface $typeHandler
    ) {
        $this->form        = $form;
        $this->typeHandler = $typeHandler;
    }

    /**
     * @param string                           $token
     * @param Request                          $request
     * @param ModifyPasswordResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        $token,
        Request $request,
        ModifyPasswordResponderInterface $responder
    ) {
        $modifyPasswordForm = $this->form->create(ModifyPasswordType::class)
            ->handleRequest($request);

        if ($this->typeHandler->handle($modifyPasswordForm, $token)) {
            return $responder(true);
        }

        return $responder(false, $modifyPasswordForm);
    }
}
