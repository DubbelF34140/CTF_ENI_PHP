<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/welcome', name: 'app_welcome')]
    public function welcome(): Response
    {
        if ($this->getUser()) {
            $this->addFlash('success', 'Hello ' . $this->getUser()->getUserIdentifier() . ' !');
        }

        return $this->redirectToRoute('app_main');
    }


    #[Route('/aboutus', name: 'app_aboutus')]
    public function aboutUs(): Response
    {
        return $this->render('home/aboutus.html.twig', [
        ]);
    }

    #[Route('/word_found/{word}', name: 'app_word_found')]
    public function wordFound(string $word): Response
    {
        return $this->render('home/word_found.html.twig', [
            'word' => $word,
        ]);
    }
}
