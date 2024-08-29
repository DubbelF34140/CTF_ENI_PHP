<?php

namespace App\DataFixtures;

use App\Entity\Musicien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MusicienFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $m1 = new Musicien();
        $m1->setNom('Bob Dylan');
        $m1->setDescription('Il porte un bob et il s\'appelle Dylan.');

        $m2 = new Musicien();
        $m2->setNom('Elvis Presley');
        $m2->setDescription('Le roi du pelvis. Un peu grassouillet sur la fin...');

        $m3 = new Musicien();
        $m3->setNom('Chuck Berry');
        $m3->setDescription('Il aime les fraises.');

        $m4 = new Musicien();
        $m4->setNom('Jimi Hendrix');
        $m4->setDescription('Le guitariste avec le plus de rendez vous chez le dentiste.');

        $m5 = new Musicien();
        $m5->setNom('James Brown');
        $m5->setDescription('Un mec en or askip');

        $m6 = new Musicien();
        $m6->setNom('Little Richard');
        $m6->setDescription('Pas si petit qu\'on le crois..');

        $manager->persist($m1);
        $manager->persist($m2);
        $manager->persist($m3);
        $manager->persist($m4);
        $manager->persist($m5);
        $manager->persist($m6);
        $manager->flush();
    }
}
