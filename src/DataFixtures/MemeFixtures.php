<?php

namespace App\DataFixtures;

use App\Entity\Meme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MemeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $b1 = new Meme();
        $b1->setName('Rickroll');
        $b1->setUrl('https://media1.tenor.com/m/x8v1oNUOmg4AAAAd/rickroll-roll.gif');

        $b2 = new Meme();
        $b2->setName('Deadpool');
        $b2->setUrl('https://media1.tenor.com/m/0qkZK8v9N6IAAAAC/deadpool-shakehead.gif');

        $b3 = new Meme();
        $b3->setName('Sleep');
        $b3->setUrl('https://media1.tenor.com/m/1ag2zxamoT0AAAAd/sleep-cat.gif');


        $manager->persist($b1);
        $manager->persist($b2);
        $manager->persist($b3);
        $manager->flush();
    }
}
