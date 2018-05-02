<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/04/2018
 * Time: 07:57
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ObserveControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function testObserve()
    {
        $client = static::createClient();

        $client->request('GET', '/observe');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
