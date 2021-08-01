<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $brands1 = new Brand();
        $brands1->setNameBrd("Tesla");

        $brands2 = new Brand();
        $brands2->setNameBrd("Renault");

        $brands3 = new Brand();
        $brands3->setNameBrd("Peugeot");

        $brands4 = new Brand();
        $brands4->setNameBrd("Mazda");

        $this->addReference("tesla_brand", $brands1);
        $this->addReference("renault_brand", $brands2);
        $this->addReference("peugeot_brand", $brands3);
        $this->addReference("mazda_brand", $brands4);

        $manager->persist($brands1);
        $manager->persist($brands2);
        $manager->persist($brands3);
        $manager->persist($brands4);
        $manager->flush();
    }
}
