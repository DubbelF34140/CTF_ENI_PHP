<?php

namespace App\Controller;

use App\Repository\MusicienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MusicienController extends AbstractController
{
    #[Route('/musicien', name: 'app_musicien')]
    public function index(MusicienRepository $musicienRepository): Response
    {

        $musiciens = $musicienRepository->findAll();

        return $this->render('musicien/index.html.twig', [
            'controller_name' => 'MusicienController',
            'musiciens' => $musiciens,
        ]);
    }
}
