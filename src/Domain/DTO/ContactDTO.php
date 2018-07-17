<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 11/06/2018
 * Time: 22:16
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ContactDTOInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO implements ContactDTOInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "votre nom doit contenir au moins {{ limit }} carctères",
     *      maxMessage = "votre nom doit contenir moins de {{ limit }} carctères"
     * )
     * @var string
     */
    public $author;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 50,
     *      max = 5000,
     *      minMessage = "votre message doit contenir au moins {{ limit }} carctères",
     *      maxMessage = "votre message doit contenir moins de {{ limit }} carctères"
     * )
     * @var string
     */
    public $message;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 15,
     *      minMessage = "votre sujet doit contenir au moins {{ limit }} carctères",
     *      maxMessage = "votre sujet doit contenir moins de {{ limit }} carctères"
     * )
     * @var string
     */
    public $subject;

    /**
     * @Assert\Email(
     *     message = "l'email '{{ value }}' n'est pas valide",
     *     checkMX = true
     * )
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
