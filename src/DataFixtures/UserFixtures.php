<?php

namespace App\DataFixtures;

use App\Entity\Anniversaire;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {

        $u1 = new User();
        $u1->setNom('DRAUD');
        $u1->setPrenom('Alexis');
        $u1->setEmail('alexis.draud2023@campus-eni.fr');
        $a1 = new Anniversaire();
        $a1->setDate(new \DateTime('1995-11-07'));
        $manager->persist($a1);
        $manager->flush();
        $u1->setAnniversaire($a1);
        $u1->setPassword(
            $this->userPasswordHasher->hashPassword(
                $u1,
                'password123'
            )
        );

        $u2 = new User();
        $u2->setNom('BODIN');
        $u2->setPrenom('Sebastien');
        $u2->setEmail('sebastien.bodin2022@campus-eni.fr');
        $a2 = new Anniversaire();
        $a2->setDate(new \DateTime('1976-02-17'));
        $manager->persist($a2);
        $manager->flush();
        $u2->setAnniversaire($a2);
        $u2->setPassword(
            $this->userPasswordHasher->hashPassword(
                $u2,
                'password123'
            )
        );

        $u3 = new User();
        $u3->setNom('WOELFFLE');
        $u3->setPrenom('Ylan');
        $u3->setEmail('ylan.woelffle2023@campus-eni.fr');
        $a3 = new Anniversaire();
        $a3->setDate(new \DateTime('2003-06-08'));
        $manager->persist($a3);
        $manager->flush();
        $u3->setAnniversaire($a3);
        $u3->setPassword(
            $this->userPasswordHasher->hashPassword(
                $u3,
                'password123'
            )
        );


        $manager->persist($u1);
        $manager->persist($u2);
        $manager->persist($u3);
        $manager->flush();
    }
}
