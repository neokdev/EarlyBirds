<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 23/05/2018
 * Time: 13:37
 */

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\ObserveBuilderInterface;
use App\Domain\Repository\ObserveRepository;
use App\UI\Form\Handler\Interfaces\ObserveTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class ObserveTypeHandler implements ObserveTypeHandlerInterface
{
    /**
     * @var ObserveBuilderInterface
     */
    private $observeBuilder;

    /**
     * @var ObserveRepository
     */
    private $observeRepository;

    /**
     * ObserveTypeHandler                       constructor.
     *
     * @param ObserveBuilderInterface           $observeBuilder
     * @param ObserveRepository                 $observeRepository
     */
    public function __construct(
        ObserveBuilderInterface                 $observeBuilder,
        ObserveRepository                       $observeRepository
    ) {
        $this->observeBuilder           =       $observeBuilder;
        $this->observeRepository        =       $observeRepository;
    }

    /**
     * @param FormInterface $form
     *
     * @return bool|mixed
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->observeBuilder->create(
                $form->getData()->author,
                $form->getData()->ref,
                $form->getData()->description,
                $form->getData()->latitude,
                $form->getData()->longitude,
                $form->getData()->img
            );

            $this->observeRepository->save($this->observeBuilder->getObserve());

            return true;
        }

        return false;
    }
}
