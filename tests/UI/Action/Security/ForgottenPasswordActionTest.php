<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 15:06
 */

namespace App\Tests\UI\Action\Security;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ForgottenPasswordActionTest extends WebTestCase
{
    /**
     * @test
     */
    public function testForgottenPasswordAction()
    {
        $client = static::createClient();

        $client->request('GET', '/forgottenpassword');

        static::assertSame(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }
}
