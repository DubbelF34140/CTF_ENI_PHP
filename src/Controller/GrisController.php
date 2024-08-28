<?php

namespace App\Controller;

use App\Repository\GrisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GrisController extends AbstractController
{
    #[Route('/gris', name: 'app_gris')]
    public function index(GrisRepository $grisRepository): Response
    {
        $gris = $grisRepository->findAll();

        return $this->render('gris/index.html.twig', [
            'controller_name' => 'GrisController',
            'grislist' => $gris,
        ]);
    }
}
