<?php

namespace App\DataFixtures;

use App\Entity\Boisson;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BoissonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $b1 = new Boisson();
        $b1->setNom('Coca-cola');
        $b1->setDescription('La meilleur boisson !!');

        $b2 = new Boisson();
        $b2->setNom('Ice-tea');
        $b2->setDescription('Si tu n\'aime pas les bulles.');

        $b3 = new Boisson();
        $b3->setNom('Pepsi');
        $b3->setDescription('Un manque d\'originalité ?');

        $b4 = new Boisson();
        $b4->setNom('Fanta');
        $b4->setDescription('Si tu es plus fruits.');
        
        $b5 = new Boisson();
        $b5->setNom('Monster');
        $b5->setDescription('Pour les palais de doberman.');

        $b6 = new Boisson();
        $b6->setNom('Redbull');
        $b6->setDescription('Donne des ailes askip.');

        $manager->persist($b1);
        $manager->persist($b2);
        $manager->persist($b3);
        $manager->persist($b4);
        $manager->persist($b5);
        $manager->persist($b6);
        $manager->flush();
    }
}
