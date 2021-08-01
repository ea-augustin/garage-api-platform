<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city1 = new City();
        $city1->setNameCit("Saint Etienne");
        $city1->setRegionCit("42100");

        $city2 = new City();
        $city2->setNameCit("Lyon");
        $city2->setRegionCit("69009");

        $city3 = new City();
        $city3->setNameCit("Marseille");
        $city3->setRegionCit("13001");

        $city4 = new City();
        $city4->setNameCit("Strasbourg");
        $city4->setRegionCit("67482");

        $this->addReference("saintEtienne_city",$city1);
        $this->addReference("lyon_city",$city2);
        $this->addReference("marseille_city",$city3);
        $this->addReference("strasbourg_city",$city4);

        $manager->persist($city1);
        $manager->persist($city2);
        $manager->persist($city3);
        $manager->persist($city4);
        $manager->flush();
    }
}
