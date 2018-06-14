<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 14/06/2018
 * Time: 17:51
 */

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Models\Observe;
use Symfony\Component\Form\FormInterface;

/**
 * Interface UpdateObserveTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface UpdateObserveTypeHandlerInterface
{
    /**
     * @param FormInterface|null $form
     * @param Observe            $observe
     * @return mixed
     */
    public function handle(FormInterface $form = null, Observe $observe);
}