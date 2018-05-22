<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 23:43
 */

namespace App\Domain\DTO;

class ForgottenPasswordDTO
{
    /**
     * @var string
     */
    public $email;

    /**
     * ForgottenPasswordDTO constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}
