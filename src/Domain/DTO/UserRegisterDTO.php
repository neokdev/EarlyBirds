<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 20:31
 */

namespace App\Domain\DTO;

class UserRegisterDTO
{
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    private $plainPassword;

    /**
     * UserRegisterDTO constructor.
     * @param string $email
     * @param string $plainPassword
     */
    public function __construct(
        string $email,
        string $plainPassword
    ) {
        $this->email         = $email;
        $this->plainPassword = $plainPassword;
    }
}
