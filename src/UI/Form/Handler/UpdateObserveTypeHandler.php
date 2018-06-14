<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 14/06/2018
 * Time: 17:52
 */

namespace App\UI\Form\Handler;


use App\Domain\Builder\Interfaces\ObserveBuilderInterface;
use App\Domain\Models\Observe;
use App\Domain\Repository\ObserveRepository;
use App\Domain\Repository\TaxRefRepository;
use App\UI\Form\Handler\Interfaces\UpdateObserveTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class UpdateObserveTypeHandler implements UpdateObserveTypeHandlerInterface
{
    /**
     * @var ObserveRepository
     */
    private $observeRepository;

    /**
     * @var ObserveBuilderInterface
     */
    private $observeBuilser;

    /**
     * @var TaxRefRepository
     */
    private $taxrefRepository;

    /**
     * @var UploadedFile
     */
    private $fileOutput;

    /**
     * @var string
     */
    private $imageFolder;

    /**
     * @var FlashBagInterface;
     */
    private $flash;

    /**
     * UpdateObserveTypeHandler constructor.
     * @param ObserveRepository $observeRepository
     * @param ObserveBuilderInterface $observeBuilser
     * @param TaxRefRepository $taxrefRepository
     * @param null $fileOutput
     * @param string $imageFolder
     * @param FlashBagInterface $flash
     */
    public function __construct(
        ObserveRepository       $observeRepository,
        ObserveBuilderInterface $observeBuilser,
        TaxRefRepository        $taxrefRepository,
                                $fileOutput = null,
        string                  $imageFolder,
        FlashBagInterface       $flash
    ) {
        $this->observeRepository = $observeRepository;
        $this->observeBuilser    = $observeBuilser;
        $this->taxrefRepository  = $taxrefRepository;
        $this->fileOutput        = $fileOutput;
        $this->imageFolder       = $imageFolder;
        $this->flash             = $flash;
    }


    /**
     * @param FormInterface|null $form
     * @param Observe            $observe
     *
     * @return bool|mixed
     */
    public function handle(FormInterface $form = null, Observe $observe)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $observe
                ->setDescription($form->getData()->description)
                ->setLongitude($form->getData()->longitude)
                ->setLatitude($form->getData()->latitude)
            ;

            if($observe->getRef()->getNomComplet() !== $form->getData()->ref) {

                $bird = $form->getData()->ref;
                $result = $this->taxrefRepository->findOneBy(['nomComplet' => $bird]);

                $observe->setRef($result);
            }

            if($observe->getImg() !== $form->getData()->img) {

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

                $observe->setImg($this->fileOutput->getPath()."/".$this->fileOutput->getFilename());
            }

            $this->observeRepository->update();

            $this->flash->add('observe','votre observation à été modifiée');

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