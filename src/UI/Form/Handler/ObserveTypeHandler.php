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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ObserveTypeHandler implements ObserveTypeHandlerInterface
{
    /**
     * @var string
     */
    private $imageFolder;

    /**
     * @var ObserveBuilderInterface
     */
    private $observeBuilder;

    /**
     * @var ObserveRepository
     */
    private $observeRepository;

    /**
     * @var FlashBagInterface
     */
    private $flash;

    /**
     * @var string
     */
    private $fileOutput;

    /**
     * @var TokenStorageInterface
     */
    private $token;

    /**
     * ObserveTypeHandler constructor.
     *
     * @param ObserveBuilderInterface  $observeBuilder
     * @param ObserveRepository        $observeRepository
     * @param string                   $imageFolder
     * @param FlashBagInterface        $flashBag
     * @param TokenStorageInterface    $token
     */
    public function __construct(
        TokenStorageInterface   $token,
        ObserveBuilderInterface $observeBuilder,
        ObserveRepository       $observeRepository,
        string                  $imageFolder,
        FlashBagInterface       $flashBag
    ) {
        $this->token             = $token;
        $this->observeBuilder    = $observeBuilder;
        $this->observeRepository = $observeRepository;
        $this->imageFolder       = $imageFolder;
        $this->flash             = $flashBag;
        $this->fileOutput        = null;
    }

    /**
     * @param FormInterface $form
     *
     * @return bool|mixed
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             */
            $file = $form->getData()->img;

            if ($file) {

                $this->fileOutput = $file->move(
                    $this->imageFolder,
                    $this->generateUniqueFileName()."."
                    .$file->guessExtension()
                );
            }

            $this->observeBuilder->create(
                $this->token->getToken()->getUser(),
                $form->getData()->ref,
                $form->getData()->description,
                $form->getData()->latitude,
                $form->getData()->longitude,
                $this->fileOutput
            );

            $this->observeRepository->save($this->observeBuilder->getObserve());

            $this->flash->add('observe','votre observation à été ajoutée');

            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
