<?php

namespace App\DataFixtures;

use App\Entity\Boisson;
use App\Entity\Comete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CometeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Comete();
        $c1->setNom('OUMUAMUA');
        $c1->setImg('');

        $c2 = new Comete();
        $c2->setNom('Halley');
        $c2->setImg('');

        $c3 = new Comete();
        $c3->setNom('Hale-Bopp');
        $c3->setImg('');

        $c4 = new Comete();
        $c4->setNom('Mc Naught');
        $c4->setImg('');

        $c5 = new Comete();
        $c5->setNom('Hyakutake');
        $c5->setImg('');

        $c6 = new Comete();
        $c6->setNom('Churyumov-Gerasimenko');
        $c6->setImg('');

        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);
        $manager->persist($c4);
        $manager->persist($c5);
        $manager->persist($c6);
        $manager->flush();
    }
}
