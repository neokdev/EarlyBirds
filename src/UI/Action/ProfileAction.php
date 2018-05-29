<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:37
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\ProfileActionInterface;
use App\UI\Form\Handler\Interfaces\ProfileTypeHandlerInterface;
use App\UI\Form\ProfileType;
use App\UI\Responder\Interfaces\ProfileResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProfileAction
 * @Route(
 *     "/profile",
 *     name="app_profile",
 *     methods={"GET", "POST"}
 * )
 */
final class ProfileAction implements ProfileActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $form;
    /**
     * @var ProfileTypeHandlerInterface
     */
    private $typeHandler;

    /**
     * ProfileAction constructor.
     * @param FormFactoryInterface        $form
     * @param ProfileTypeHandlerInterface $typeHandler
     */
    public function __construct(
        FormFactoryInterface $form,
        ProfileTypeHandlerInterface $typeHandler
    ) {
        $this->form        = $form;
        $this->typeHandler = $typeHandler;
    }
    /**
     * @param Request                   $request
     * @param ProfileResponderInterface $profileResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ProfileResponderInterface $profileResponder
    ) {
        $profileType = $this->form->create(ProfileType::class)
            ->handleRequest($request);

        if ($this->typeHandler->handle($profileType)) {
            return $profileResponder(true);
        }

        return $profileResponder(false, $profileType);
    }
}
