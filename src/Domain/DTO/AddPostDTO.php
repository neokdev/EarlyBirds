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
     * @var UploadedFile
     */
    public $miniature;

    /**
     * AddPostDTO constructor.
     * @param null|string       $title
     * @param null|string       $content
     * @param null|string       $category
     * @param null|UploadedFile $img
     * @param null|UploadedFile $miniature
     */
    public function __construct(
        string       $title     = null,
        string       $content   = null,
        string       $category  = null,
        UploadedFile $img       = null,
        UploadedFile $miniature = null

    ) {
        $this->title     = $title;
        $this->content   = $content;
        $this->category  = $category;
        $this->img       = $img;
        $this->miniature = $miniature;
    }
}
