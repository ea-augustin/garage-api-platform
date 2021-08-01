<?php

namespace App\DataFixtures;

use App\Entity\Professional;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $hacher;

    public function __construct(UserPasswordHasherInterface $hacher)
    {
        $this->hacher = $hacher;
    }

    public function load(ObjectManager $manager)
    {
        $userAdmin = new Professional();
        $userAdmin->setUsername("admin");
        $userAdmin->setFirstname("John");
        $userAdmin->setLastname("Lodevie");
        $userAdmin->setEmail("jlodevie@gmail.com");
        $userAdmin->setTelephone("0629251749");
        $userAdmin->setSiren("Jl884988585dC");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->hacher->hashPassword($userAdmin, "admin"));

        $user = new Professional();
        $user->setUsername("user");
        $user->setFirstname("Kim");
        $user->setLastname("Doe");
        $user->setEmail("kmde@gmail.com");
        $user->setTelephone("0629251749");
        $user->setSiren("KM8845985475BF");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->hacher->hashPassword($user, "user"));

        $manager->persist($userAdmin);
        $manager->persist($user);

        $this->addReference("lodevie_user",$userAdmin);
        $this->addReference("kim_user",$userAdmin);
        $manager->flush();
    }
}
