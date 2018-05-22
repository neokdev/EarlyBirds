<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 14:11
 */

namespace App\UI\Action\Social\Interfaces;

use Symfony\Component\HttpFoundation\Request;

interface FacebookCheckActionInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request);
}
