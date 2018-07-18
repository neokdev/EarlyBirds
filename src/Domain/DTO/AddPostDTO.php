<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 11:01
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\AddPostDTOInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPostDTO implements AddPostDTOInterface
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $category;

    /**
     * @var UploadedFile
     */
    public $img;

    /**
     * AddPostDTO constructor.
     * @param null|string       $title
     * @param null|string       $content
     * @param null|User         $author
     * @param null|string       $category
     * @param null|UploadedFile $img
     */
    public function __construct(
        string       $title    = null,
        string       $content  = null,
        User         $author   = null,
        string       $category = null,
        UploadedFile $img      = null
    ) {
        $this->title    = $title;
        $this->content  = $content;
        $this->author   = $author;
        $this->category = $category;
        $this->img      = $img;
    }


}