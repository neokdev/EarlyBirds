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
     * @Assert\NotBlank("vous devez renseigner un nom d'auteur")
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
     * @Assert\NotBlank("le message ne peut pas être vide")
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
     * @Assert\NotBlank("le message doit avoir un sujet")
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
     * @Assert\NotBlank("l'email doit être complété")
     * @Assert\Email(
     *     message = "l'email '{{ value }}' n'est pas valide",
     *     checkMX = true
     * )
     * @var string
     */
    public $mail;

    /**
     * @Assert\NotBlank("la case doit être cochée")
     * @var boolean
     */
    public $marketing;

    /**
     * @Assert\NotBlank("la case doit être cochée")
     * @var boolean
     */
    public $response;

    /**
     * ContactDTO constructor.
     * @param string|null $author
     * @param string|null $message
     * @param string|null $subject
     * @param string|null $mail
     * @param bool|null   $marketing
     * @param bool|null   $response
     */
    public function __construct(
        string $author    = null,
        string $message   = null,
        string $subject   = null,
        string $mail      = null,
        bool   $marketing = null,
        bool   $response  = null
    ) {
        $this->author    = $author;
        $this->message   = $message;
        $this->subject   = $subject;
        $this->mail      = $mail;
        $this->response  = $response;
        $this->marketing = $marketing;
    }
}
