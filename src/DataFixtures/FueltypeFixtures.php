<?php

namespace App\DataFixtures;

use App\Entity\Fueltype;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FueltypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fueltype1 = new Fueltype();
        $fueltype1->setTypeFul("Electric");

        $fueltype2 = new Fueltype();
        $fueltype2->setTypeFul("Gas");

        $fueltype3 = new Fueltype();
        $fueltype3->setTypeFul("Diesel");

        $fueltype4 = new Fueltype();
        $fueltype4->setTypeFul("Hybrid");

        $this->addReference("electric_energy", $fueltype1);
        $this->addReference("gas_energy", $fueltype2);
        $this->addReference("diesel_energy", $fueltype3);
        $this->addReference("hybrid_energy", $fueltype4);

        $manager->persist($fueltype1);
        $manager->persist($fueltype2);
        $manager->persist($fueltype3);
        $manager->persist($fueltype4);
        $manager->flush();
    }
}
