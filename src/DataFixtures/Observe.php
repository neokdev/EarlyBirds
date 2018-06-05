<?php

namespace App\DataFixtures;

use App\Domain\Models\Observe as Observes;
use App\Domain\Models\TaxRef;
use App\Domain\Models\User;
use Doctrine\Common\Persistence\ObjectManager;

class Observe extends AbstractBaseFixture
{
    private const TEST_USER = 'neokdev@gmail.com';
    private const TIMEZONE  = 'Europe/Paris';
    private $user;
    private $ref;

    /**
     * @param ObjectManager $manager
     *
     * @return mixed|void
     */
    protected function loadData(ObjectManager $manager)
    {
        $this->user = $manager->getRepository(User::class)->findOneBy(['email' => self::TEST_USER]);
        $this->ref  = $manager->getRepository(TaxRef::class)->findOneBy(['id' => rand(0, 3983)]);

        $this->createMany(Observes::class, 10, function (Observes $observe, $count) {
            $observe->setAuthor($this->user)
                ->setRef($this->ref)
                ->setDescription($this->faker->sentence)
                ->setLatitude($this->faker->latitude)
                ->setLongitude($this->faker->longitude)
                ->setImg($this->faker->imageUrl(1920, 1080, 'animals', true, 'observe', false));
        });

        $manager->flush();
    }
}
