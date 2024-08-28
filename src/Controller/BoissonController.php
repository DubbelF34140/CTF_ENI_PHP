<?php

namespace App\Controller;

use App\Repository\BoissonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BoissonController extends AbstractController
{
    #[Route('/boisson', name: 'app_boisson')]
    public function index(BoissonRepository $boissonRepository): Response
    {
        $boissonlist = $boissonRepository->findAll();


        return $this->render('boisson/index.html.twig', [
            'controller_name' => 'BoissonController',
            'boissons' => $boissonlist,
        ]);
    }
}
