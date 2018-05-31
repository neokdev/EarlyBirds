<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 29/05/2018
 * Time: 14:52
 */

namespace App\DataFixtures;

use App\Domain\Models\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';
    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;
    /**
     * UserFixtures constructor.
     * @param EncoderFactoryInterface $encoder
     */
    public function __construct(EncoderFactoryInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $encoder = $this->encoder->getEncoder(User::class);

        $factory = new Factory();
        $faker   = $factory::create("fr_FR");
        /** @var User $user */
        $user = new User(
            $faker->email,
            $faker->password,
            \Closure::fromCallable([$encoder, 'encodePassword']),
            ['ROLE_USER'],
            null,
            $faker->userName,
            $faker->firstName,
            $faker->lastName,
            "https://loremflickr.com/50/50/bird",
            null
        );

        $manager->persist($user);
        $manager->flush();

        $this->addReference('user', $user);
    }
}
