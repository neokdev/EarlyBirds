<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/06/2018
 * Time: 09:16
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

abstract class AbstractBaseFixture extends Fixture
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager): void
    {
        $this->manager = $objectManager;
        $this->faker   = Factory::create("fr_FR");

        $this->loadData($objectManager);
    }

    /**
     * @param ObjectManager $manager
     *
     * @return mixed
     */
    abstract protected function loadData(ObjectManager $manager);

    /**
     * @param string   $className
     * @param int      $count
     *
     * @param callable $factory
     */
    protected function createMany(string $className, int $count, callable  $factory): void
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);

            $this->manager->persist($entity);
            // store for usage later as App\Entity\ClassName_#COUNT#
            $this->addReference($className.'_'.$i, $entity);
        }
    }
}
