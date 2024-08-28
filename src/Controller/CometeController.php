<?php

namespace App\Controller;

use App\Repository\CometeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CometeController extends AbstractController
{
    #[Route('/comete', name: 'app_comete')]
    public function index(CometeRepository $cometeRepository): Response
    {
        $cometes = $cometeRepository->findAll();

        return $this->render('comete/index.html.twig', [
            'controller_name' => 'CometeController',
            'cometes' => $cometes,
        ]);
    }
}
