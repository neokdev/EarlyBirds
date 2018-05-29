<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/05/2018
 * Time: 10:45
 */

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Models\User;
use Symfony\Component\Form\FormInterface;

interface ProfileTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param User          $user
     *
     * @return bool
     */
    public function handle(FormInterface $form, User $user): bool;
}
