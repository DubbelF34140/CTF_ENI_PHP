<?php

namespace App\DataFixtures;

use App\Entity\FilmEnOr;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FilmEnOrFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $b1 = new FilmEnOr();
        $b1->setTitre('Goldfinger');
        $b1->setLien('https://www.youtube.com/watch?v=bKdVFscpIxo');        

        $b2 = new FilmEnOr();
        $b2->setTitre('La folie des grandeurs');
        $b2->setLien('https://www.youtube.com/watch?v=swNkzRC1HIQ');


        $b3 = new FilmEnOr();
        $b3->setTitre('de l\'or pour les braves');
        $b3->setLien('https://www.youtube.com/watch?v=wzOm1-w9VnI');
        


        $manager->persist($b1);
        $manager->persist($b2);
        $manager->persist($b3);
        $manager->flush();
    }
}
