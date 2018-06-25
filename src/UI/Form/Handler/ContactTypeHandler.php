<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 12/06/2018
 * Time: 09:36
 */

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\ContactBuilderInterface;
use App\Domain\Repository\ContactRepository;
use App\Services\Mailer;
use App\UI\Form\Handler\Interfaces\ContactTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

class ContactTypeHandler implements ContactTypeHandlerInterface
{
    /**
     * @var ContactBuilderInterface
     */
    private $contactBuilder;

    /**
     * @var ContactRepository
     */
    private $contactRepository;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * ContactTypeHandler constructor.
     * @param ContactBuilderInterface $contactBuilder
     * @param ContactRepository $contactRepository
     * @param Mailer $mailer
     */
    public function __construct(
        ContactBuilderInterface $contactBuilder,
        ContactRepository       $contactRepository,
        Mailer                  $mailer
    ) {
        $this->contactBuilder    = $contactBuilder;
        $this->contactRepository = $contactRepository;
        $this->mailer            = $mailer;
    }


    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->contactBuilder->create(
                $form->getData()->author,
                $form->getData()->message,
                $form->getData()->mail,
                $form->getData()->subject
            );

            $this->contactRepository->save($this->contactBuilder->getContact());

            $this->mailer->sendContactMail($this->contactBuilder->getContact());

            return true;
        }

        return false;
    }
}
