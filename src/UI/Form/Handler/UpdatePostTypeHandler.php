<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 18:14
 */

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\PostBuilderInterface;
use App\Domain\Models\Post;
use App\Domain\Repository\PostRepository;
use App\UI\Form\Handler\Interfaces\UpdatePostTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class UpdatePostTypeHandler implements UpdatePostTypeHandlerInterface
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var PostBuilderInterface
     */
    private $postBuilder;

    /**
     * @var TokenStorageInterface
     */
    private $token;

    /**
     * @var string
     */
    private $imageFolder;

    /**
     * @var string
     */
    private $media;

    /**
     * @var UploadedFile
     */
    private $fileOutput;

    /**
     * @var FlashBagInterface
     */
    private $flash;

    /**
     * AddPostTypeHandler constructor.
     * @param PostRepository        $postRepository
     * @param PostBuilderInterface  $postBuilder
     * @param TokenStorageInterface $token
     * @param string                $imageFolder
     * @param string                $media
     * @param FlashBagInterface     $flash
     */
    public function __construct(
        PostRepository        $postRepository,
        PostBuilderInterface  $postBuilder,
        TokenStorageInterface $token,
        string                $imageFolder,
        string                $media,
        FlashBagInterface     $flash
    ) {
        $this->postRepository = $postRepository;
        $this->postBuilder    = $postBuilder;
        $this->token          = $token;
        $this->imageFolder    = $imageFolder;
        $this->media          = $media;
        $this->fileOutput     = null;
        $this->flash          = $flash;
    }


    public function handle(FormInterface $form, Post $updPost): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $updPost
                ->setTitle($form->getData()->title)
                ->setCategory($form->getData()->category)
                ->setContent($form->getData()->content)
                ->setShortDesc($form->getData()->shortDesc)
            ;

            if($updPost->getImg() !== $form->getData()->img) {

                if ($form->getData()->img === null) {
                    $updPost->setImg($updPost->getImg());
                } else {
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

                    $updPost->setImg($this->media.$this->fileOutput->getFilename());
                }

            }

            if($updPost->getMiniature() !== $form->getData()->miniature) {

                if ($form->getData()->miniature === null) {
                    $updPost->setMiniature($updPost->getMiniature());
                } else {
                    /**
                     * @var UploadedFile $fileMiniature
                     */
                    $fileMiniature = $form->getData()->miniature;

                    if ($fileMiniature) {
                        $this->fileOutput = $fileMiniature->move(
                            $this->imageFolder,
                            $this->generateUniqueFileName()."."
                            .$fileMiniature->guessExtension()
                        );
                    }

                    $updPost->setMiniature($this->media.$this->fileOutput->getFilename());
                }

            }

            $this->postRepository->update();

            $this->flash->add("post","votre article à bien été modifié");

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