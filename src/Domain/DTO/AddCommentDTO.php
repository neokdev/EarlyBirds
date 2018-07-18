<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 11:27
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\AddCommentDTOInterface;

class AddCommentDTO implements AddCommentDTOInterface
{
    /**
     * @var string
     */
    public $content;

    /**
     * AddCommentDTO constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }


}