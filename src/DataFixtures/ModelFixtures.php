<?php

namespace App\DataFixtures;

use App\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ModelFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $model1 = new Model();
        $model1->setBrand($this->getReference("tesla_brand"));
        $model1->setNameMod("Model X");

        $model2 = new Model();
        $model2->setBrand($this->getReference("peugeot_brand"));
        $model2->setNameMod("308");


        $this->addReference("modelY_model", $model1);
        $this->addReference("308_model", $model2);


        $manager->persist($model1);
        $manager->persist($model2);
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            BrandFixtures::class,
        ];
    }
}
