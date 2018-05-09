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
    private $email;
    /**
     * @var string
     */
    private $password;

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
}
