<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 14/06/2018
 * Time: 13:59
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;
use App\Domain\DTO\Interfaces\ObserveDTOInterface;

/**
 * Interface UpdateObservationResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface UpdateObservationResponderInterface
{
    /**
     * @param bool                     $redirect
     * @param FormInterface            $form
     * @param ObserveDTOInterface|null $observeDTO
     * @param string                   $observe
     *
     * @return mixed
     */
    public function __invoke(
        bool                $redirect = false,
        ObserveDTOInterface $observeDTO = null,
        string              $observe,
        FormInterface       $form
    );
}
