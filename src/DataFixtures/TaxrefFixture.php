<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 31/05/2018
 * Time: 11:47
 */

namespace App\DataFixtures;

use App\Domain\Models\TaxRef;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TaxrefFixture extends Fixture
{
    public const TAXREF = 'taxref';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $taxref = new TaxRef();

        $manager->persist($taxref);
        $manager->flush();

        $this->addReference('taxref', $taxref);
    }
}
