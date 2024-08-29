<?php

namespace App\DataFixtures;

use App\Entity\Boisson;
use App\Entity\Gris;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GrisFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $g1 = new Gris();
        $g1->setNuance('#000000');

        $g2 = new Gris();
        $g2->setNuance('#2F4F4F');

        $g3 = new Gris();
        $g3->setNuance('#696969');

        $g4 = new Gris();
        $g4->setNuance('#808080');

        $g5 = new Gris();
        $g5->setNuance('#A9A9A9');

        $g6 = new Gris();
        $g6->setNuance('#BEBEBE');

        $g7 = new Gris();
        $g7->setNuance('#D3D3D3');

        $g8 = new Gris();
        $g8->setNuance('#DCDCDC');

        $g9 = new Gris();
        $g9->setNuance('#F5F5F5');

        $g10 = new Gris();
        $g10->setNuance('#FFFFFF');

        $manager->persist($g1);
        $manager->persist($g2);
        $manager->persist($g3);
        $manager->persist($g4);
        $manager->persist($g5);
        $manager->persist($g6);
        $manager->persist($g7);
        $manager->persist($g8);
        $manager->persist($g9);
        $manager->persist($g10);
        $manager->flush();
    }
}
