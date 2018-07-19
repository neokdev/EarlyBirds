<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 16:58
 */

namespace App\UI\Action;

use App\Domain\Repository\PostRepository;
use App\UI\Action\Interfaces\ArticleActionInterface;
use App\UI\Responder\Interfaces\ArticleResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     path="/article-{id}",
 *     name="app_read_article",
 *     methods={"GET"}
 *
 * )
 * Class ArticleAction
 * @package App\UI\Action
 */
class ArticleAction implements ArticleActionInterface
{
    /**
     * @var ArticleResponderInterface
     */
    private $articleResponder;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * ArticleAction constructor.
     * @param ArticleResponderInterface $articleResponder
     * @param PostRepository            $postRepository
     */
    public function __construct(
        ArticleResponderInterface $articleResponder,
        PostRepository            $postRepository
    ) {
        $this->articleResponder = $articleResponder;
        $this->postRepository   = $postRepository;
    }


    public function __invoke()
    {

    }
}