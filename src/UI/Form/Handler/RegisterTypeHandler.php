<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 01:21
 */

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Domain\Models\User;
use App\Domain\Repository\UserRepository;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class RegisterTypeHandler implements RegisterTypeHandlerInterface
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
     * @var UserRepository
     */
    private $userRepository;

    /**
     * RegisterTypeHandler constructor.
     * @param EncoderFactoryInterface $encoder
     * @param UserBuilderInterface    $userBuilder
     * @param UserRepository          $userRepository
     */
    public function __construct(
        EncoderFactoryInterface $encoder,
        UserBuilderInterface $userBuilder,
        UserRepository $userRepository
    ) {
        $this->encoder        = $encoder;
        $this->userBuilder    = $userBuilder;
        $this->userRepository = $userRepository;
    }

    /**
     * @param FormInterface $registerType
     *
     * @return bool
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(FormInterface $registerType): bool
    {
        if ($registerType->isSubmitted() && $registerType->isValid()) {
            $encoder = $this->encoder->getEncoder(User::class);

            $this->userBuilder->create(
                $registerType->getData()->email,
                $registerType->getData()->password,
                \Closure::fromCallable([$encoder, 'encodePassword'])
            );

            $this->userRepository->register($this->userBuilder->getUser());

            return true;
        }

        return false;
    }
}
