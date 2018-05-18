<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 12/05/2018
 * Time: 12:41
 */

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

class NonExistingEmail extends Constraint
{
    /**
     * @var string
     */
    public $message = 'Cette adresse email "{{ user }}" n\'est pas enregistrée';

    /**
     * @return string
     */
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}
