<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 11:27
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\AddCommentDTOInterface;
use App\Domain\Models\User;

class AddCommentDTO implements AddCommentDTOInterface
{
    /**
     * @var string
     */
    public $content;

    /**
     * @var User
     */
    public $author;


}