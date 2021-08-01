<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture implements  DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $address1 = new Address();
        $address1->setStreetNumAdd("16 boulevard Jean Jaures");
        $address1->setPostalCodeAdd("42160");
        $address1->setCity($this->getReference("saintEtienne_city"));

        $address2 = new Address();
        $address2->setStreetNumAdd("16 boulevard Jean Jaures");
        $address2->setPostalCodeAdd("67482");
        $address2->setCity($this->getReference("strasbourg_city"));

        $this->addReference("address1",$address1);
        $this->addReference("address2",$address2);

        $manager->persist($address1);
        $manager->persist($address2);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CityFixtures::class,
        ];
    }
}
