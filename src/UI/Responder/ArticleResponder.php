<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 15:53
 */

namespace App\UI\Responder;

use App\Domain\Models\Post;
use App\UI\Responder\Interfaces\ArticleResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ArticleResponder
 * @package App\UI\Responder
 */
class ArticleResponder implements ArticleResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ArticleResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param Post $post
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(Post $post)
    {
        $response = new Response(
            $this->twig->render(
                'article.html.twig',
                ['post' => $post]
            ));

        return $response;
    }

}