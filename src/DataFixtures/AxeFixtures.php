<?php

namespace App\DataFixtures;

use App\Entity\Axe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AxeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $blagues = [
            "Pourquoi les développeurs détestent-ils le soleil ? Parce qu'il y a trop de bugs quand il brille.",
            "Un développeur entre dans un bar, commande une bière... 1... 2... 4... 8... 16... Ah mince, il a fait un débogage infini !",
            "Comment appelle-t-on un codeur en vacances ? Un décompilateur.",
            "Le plus court chemin entre deux points ? Un développeur dira toujours que c'est un raccourci clavier.",
            "Pourquoi les développeurs utilisent-ils toujours des lunettes ? Parce qu'ils ne voient pas bien les variables sans !"
        ];

        foreach ($blagues as $texte) {
            $axe = new Axe();
            $axe->setDescription($texte);

            $manager->persist($axe);
        }

        $manager->flush();
    }
}
