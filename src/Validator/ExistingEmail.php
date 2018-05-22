<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 12/05/2018
 * Time: 12:41
 */

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

class ExistingEmail extends Constraint
{
    /**
     * @var string
     */
    public $message = 'Cette adresse mail "{{ user }}" est déjà enregistrée';

    /**
     * @return string
     */
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}
