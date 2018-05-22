<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 09/05/2018
 * Time: 16:37
 */

namespace App\UI\Form\Handler;

use App\UI\Form\Handler\Interfaces\LoginTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class LoginTypeHandler implements LoginTypeHandlerInterface
{
    /**
     * @param FormInterface $loginType
     *
     * @return bool
     */
    public function handle(FormInterface $loginType): bool
    {
        return false;
    }
}
