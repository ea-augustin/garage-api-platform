<?php

namespace App\DataFixtures;

use App\Entity\Advertisement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AdvertisementFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $advertisement = new Advertisement();
        $advertisement->setBrand($this->getReference("tesla_brand"));
        $advertisement->setFueltype($this->getReference("electric_energy"));
        $advertisement->setGarage($this->getReference("autoClub"));
        $advertisement->setTitleAdv("Tesla sor sale. Great condition");
        $advertisement->setPriceAdv(15000);
        $advertisement->setDescriptionAdv("Lorem Ipsum has been the took a galley of type and scrambled it to make a type specimen book.");
        $advertisement->setMileageAdv(5500);
        $advertisement->setDateAdv(new \DateTime('06/04/2014'));
        $advertisement->setYear(2009);

        $advertisement2 = new Advertisement();
        $advertisement2->setBrand($this->getReference("mazda_brand"));
        $advertisement2->setFueltype($this->getReference("electric_energy"));
        $advertisement2->setGarage($this->getReference("superAuto"));
        $advertisement2->setTitleAdv("Mazda. Great condition");
        $advertisement2->setPriceAdv(100000);
        $advertisement2->setDescriptionAdv("Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.");
        $advertisement2->setMileageAdv(5500);
        $advertisement2->setDateAdv(new \DateTime('06/04/2021'));
        $advertisement2->setYear(2011);

        $manager->persist($advertisement);
        $manager->persist($advertisement2);
        $manager->flush();
    }


    public function getDependencies()
    {
       return[
           BrandFixtures::class,
           FueltypeFixtures::class,
           GarageFixtures::class,
       ];

    }
}
