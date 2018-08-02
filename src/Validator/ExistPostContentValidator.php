<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 23/07/2018
 * Time: 16:04
 */

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ExistPostContentValidator extends ConstraintValidator
{

    public function validate($value,  Constraint $constraint)
    {

        if (strlen($value) < 50) {
            $countValue = strlen($value);
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ number }}', $countValue)
                ->addViolation();
        } elseif (strlen($value) > 15000) {
            $countValue = strlen($value);
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ number }}', $countValue)
                ->addViolation();
        }

    }

}