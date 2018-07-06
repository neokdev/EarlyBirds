<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 11/06/2018
 * Time: 22:23
 */

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\ContactBuilderInterface;
use App\Domain\Models\Contact;

/**
 * Class ContactBuilder
 * @package App\Domain\Builder
 */
class ContactBuilder implements ContactBuilderInterface
{
    /**
     * @var Contact
     */
    private $contact;

    /**
     * @param string $author
     * @param string $mail
     * @param string $message
     * @param string $subject
     * @param bool   $response
     * @param bool   $marketing
     *
     * @return ContactBuilder
     */
    public function create(
        string $author,
        string $mail,
        string $message,
        string $subject,
        bool   $response,
        bool   $marketing
    ): self {
        $this->contact = new Contact(
            $author,
            $message,
            $subject,
            $mail,
            $response,
            $marketing
        );

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
