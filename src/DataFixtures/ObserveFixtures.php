<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 29/05/2018
 * Time: 14:44
 */

namespace App\DataFixtures;

use App\Domain\Models\Observe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ObserveFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $factory = new Factory();
        $faker   = $factory::create("fr_FR");

        for ($i = 0; $i < 50; $i++) {
            $observe = new Observe();
            $observe->setAuthor($this->getReference('user'));
            $observe->setRef($this->getReference('taxref'));
            $observe->setDescription($faker->sentence);
            $observe->setLatitude($faker->latitude);
            $observe->setLongitude($faker->longitude);
            $observe->setImg("https://loremflickr.com/1920/1080/bird");
            $observe->setValidator($this->getReference('user'));
            $observe->addUpvoter($this->getReference('user'));

            $manager->persist($observe);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
