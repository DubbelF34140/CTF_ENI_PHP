<?php

namespace App\Controller;

use App\Entity\FilmEnOr;
use App\Repository\FilmEnOrRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmEnOrController extends AbstractController
{
    #[Route('/or', name: 'app_or')]
    public function index(FilmEnOrRepository $repo): Response
    {
        $films = $repo->findAll();
        return $this->render('film_en_or/index.html.twig', [
            'films' => $films,
        ]);
    }
}
