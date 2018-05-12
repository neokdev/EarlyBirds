<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 12/05/2018
 * Time: 12:46
 */

namespace App\Validator;

use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NonExistingEmailValidator extends ConstraintValidator
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * NonExistingEmailValidator constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if (null !== $this->userRepository->findOneBy(['email' => $value])) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ user }}', $value)
                ->addViolation();
        }
    }
}
