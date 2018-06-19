<?php

namespace App\DataFixtures;

use App\Domain\Models\Observe as Observes;
use App\Domain\Models\TaxRef;
use App\Domain\Models\User;
use App\Domain\Repository\TaxRefRepository;
use Doctrine\Common\Persistence\ObjectManager;

class MyObserve extends AbstractBaseFixture
{
    private const TEST_USER = 'neokdev@gmail.com';
    private $user;
    /**
     * @var TaxRefRepository
     */
    private $taxRefRepository;

    /**
     * MyObserve constructor.
     * @param TaxRefRepository $taxRefRepository
     */
    public function __construct(TaxRefRepository $taxRefRepository)
    {
        $this->taxRefRepository = $taxRefRepository;
    }

    /**
     * @param ObjectManager $manager
     *
     * @return mixed|void
     */
    protected function loadData(ObjectManager $manager)
    {
        $this->user = $manager->getRepository(User::class)->findOneBy(['email' => self::TEST_USER]);

        $taxref = null;
        $this->createMany(Observes::class, 0, function (Observes $observe, $count) {
            /** @var TaxRef $taxref */
            while (!isset($taxref) || null === $taxref->getNomVern()) {
                $taxref = $this->taxRefRepository->findOneBy(['id' => rand(0, 3983)]);
            }

            $observe->setAuthor($this->user);
            $observe->setRef($taxref);
            $observe->setLatitude($this->faker->latitude(42, 51));
            $observe->setDescription($this->faker->text);
            $observe->setLongitude($this->faker->longitude(-5, 8));
            $observe->setImg($this->faker->imageUrl(1920, 1080, 'animals', true, 'observe', false));
            $date = $this->faker->dateTimeBetween('-1 year', 'now');
            $observe->setCreatedAt($date);
            $observe->setUpdatedAt($date);
        });

        $manager->flush();
    }
}
