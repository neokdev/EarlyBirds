<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 01:01
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ModifyPasswordDTOInterface;

class ModifyPasswordDTO implements ModifyPasswordDTOInterface
{
    /**
     * @var string
     */
    private $password;

    /**
     * ModifyPasswordDTO constructor.
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}
