<?php

namespace App\DataFixtures;

use App\Entity\Garage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GarageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $garage1 = new Garage();
        $garage1->setNameGar("Auto-Club");
        $garage1->setAddress($this->getReference("address1"));
        $garage1->setProfessional($this->getReference("lodevie_user"));
        $garage1->setEmailGar("jlodevie@gmail.com");
        $garage1->setTelephoneGar("0629251749");

        $garage2 = new Garage();
        $garage2->setNameGar("Super-auto");
        $garage2->setAddress($this->getReference("address2"));
        $garage2->setProfessional($this->getReference("kim_user"));
        $garage2->setEmailGar("kmde@gmail.com");
        $garage2->setTelephoneGar("0629251749");

        $this->addReference("autoClub",$garage1);
        $this->addReference("superAuto",$garage2);

        $manager->persist($garage1);
        $manager->persist($garage2);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            AddressFixtures::class,
            CityFixtures::class
        ];
    }
}
