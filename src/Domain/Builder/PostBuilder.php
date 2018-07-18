<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 13:33
 */

namespace App\Domain\Builder;


use App\Domain\Builder\Interfaces\PostBuilderInterface;
use App\Domain\Models\Post;
use App\Domain\Models\User;

class PostBuilder implements PostBuilderInterface
{
    /**
     * @var Post
     */
    private $post;

    public function create(
        string $title,
        string $content,
        User   $author,
        string $category,
        string $img
    ) {
        $this->post = new Post(
            $title,
            $content,
            $author,
            $category,
            $img
        );
    }

    public function getPost(): Post
    {
        return $this->post;
    }

}