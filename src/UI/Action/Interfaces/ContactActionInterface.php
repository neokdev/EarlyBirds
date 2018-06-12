<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 11/06/2018
 * Time: 21:32
 */

namespace App\UI\Action\Interfaces;
use App\UI\Responder\Interfaces\ContactResponderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ContactActionInterface
 * @package App\UI\Action\Interfaces
 */
interface ContactActionInterface
{
    public function __invoke(ContactResponderInterface $contactResponder, Request $request);
}
