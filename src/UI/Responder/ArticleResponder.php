<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 15:53
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\ArticleResponderInterface;
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


    public function __invoke($post)
    {

    }

}