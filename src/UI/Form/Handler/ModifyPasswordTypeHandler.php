<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 01:12
 */

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Domain\Models\User;
use App\Domain\Repository\UserRepository;
use App\UI\Form\Handler\Interfaces\ModifyPasswordTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class ModifyPasswordTypeHandler implements ModifyPasswordTypeHandlerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserBuilderInterface
     */
    private $builder;
    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;
    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    /**
     * ModifyPasswordTypeHandler constructor.
     * @param UserRepository          $userRepository
     * @param UserBuilderInterface    $builder
     * @param EncoderFactoryInterface $encoder
     * @param FlashBagInterface       $flashBag
     */
    public function __construct(
        UserRepository $userRepository,
        UserBuilderInterface $builder,
        EncoderFactoryInterface $encoder,
        FlashBagInterface $flashBag
    ) {
        $this->userRepository = $userRepository;
        $this->builder        = $builder;
        $this->encoder        = $encoder;
        $this->flashBag       = $flashBag;
    }

    /**
     * @param FormInterface $form
     * @param string        $token
     *
     * @return bool
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(
        FormInterface $form,
        string $token
    ): bool {
        if ($form->isSubmitted() && $form->isValid()) {
            $encoder = $this->encoder->getEncoder(User::class);

            $user = $this->userRepository->findOneBy(['resetPasswordToken' => $token]);

            $this->builder->modifyPassword(
                $user->getEmail(),
                $form->getData()->password,
                \Closure::fromCallable([$encoder, 'encodePassword'])
            );

            // TODO : Use correctly the builder for updating password an issue to fix occurs at ths time
            $user->setPassword($this->builder->getUser()->getPassword());
            $user->setResetPasswordToken(null);

            $this->userRepository->register($user);

            $this->flashBag->add('profile', 'Mot de passe changé avec succès');

            return true;
        }

        return false;
    }
}