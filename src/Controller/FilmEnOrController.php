<?php

namespace App\Controller;

use App\Entity\FilmEnOr;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmEnOrController extends AbstractController
{
    #[Route('/or', name: 'app_or')]
    public function index(): Response
    {
        $or = new FilmEnOr();
        $or->setLien("https://www.youtube.com/watch?v=swNkzRC1HIQ");
        return $this->render('film_en_or/index.html.twig', [
            'controller_name' => 'FilmEnOrController',
            'film' => $or
        ]);
    }
}
