<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 29/05/2018
 * Time: 14:44
 */

namespace App\DataFixtures;

use App\Domain\Models\Observe;
use App\Domain\Models\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ObserveFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++) {
            $observe = new Observe();
            $observe->setAuthor($this->getReference(UserFixtures::USER));
            $observe->setImg("https://loremflickr.com/1920/1080/bird");
        }
    }
}
