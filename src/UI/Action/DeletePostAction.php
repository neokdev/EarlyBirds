<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 19/07/2018
 * Time: 14:54
 */

namespace App\UI\Action;


use App\Domain\Repository\PostRepository;
use App\UI\Responder\Interfaces\DeletePostResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     path="/delete-post-{id}",
 *     name="app_delete_post",
 *     methods={"POST"}
 * )
 * Class DeletePostAction
 * @package App\UI\Action
 */
class DeletePostAction
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var DeletePostResponderInterface
     */
    private $deletePostResponder;

    /**
     * DeletePostAction constructor.
     * @param PostRepository               $postRepository
     * @param DeletePostResponderInterface $deletePostResponder
     */
    public function __construct(
        PostRepository               $postRepository,
        DeletePostResponderInterface $deletePostResponder)
    {
        $this->postRepository      = $postRepository;
        $this->deletePostResponder = $deletePostResponder;
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $id = $request->attributes->get('id');
        $post = $this->postRepository->findOneBy(['id' => $id]);
        $this->postRepository->delete($post);

        $responder = $this->deletePostResponder;
        return $responder();
    }
}