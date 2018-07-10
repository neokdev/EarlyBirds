<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 11/06/2018
 * Time: 22:16
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ContactDTOInterface;

class ContactDTO implements ContactDTOInterface
{
    /**
     * @var string
     */
    public $author;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $mail;

    /**
     * @var boolean
     */
    public $marketing;

    /**
     * @var boolean
     */
    public $response;

    /**
     * Contact constructor.
     *
     * @param string $author
     * @param string $message
     * @param string $subject
     * @param string $mail
     * @param bool   $marketing
     * @param bool   $response
     */
    public function __construct(
        string $author,
        string $message,
        string $subject,
        string $mail,
        bool   $marketing,
        bool   $response
    ) {
        $this->author    = $author;
        $this->message   = $message;
        $this->subject   = $subject;
        $this->mail      = $mail;
        $this->response  = $response;
        $this->marketing = $marketing;
    }
}
