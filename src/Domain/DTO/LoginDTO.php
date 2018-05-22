<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 09/05/2018
 * Time: 15:04
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\LoginDTOInterface;

class LoginDTO implements LoginDTOInterface
{
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;

    /**
     * LoginDTO constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(
        string $email,
        string $password
    ) {
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
