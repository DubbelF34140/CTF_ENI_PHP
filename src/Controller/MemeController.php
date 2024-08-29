<?php

namespace App\Controller;

use App\Entity\Meme;
use App\Form\MemeformType;
use App\Repository\MemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MemeController extends AbstractController
{
    #[Route('/meme', name: 'app_meme')]
    public function index(MemeRepository $memeRepository): Response
    {

        $memes = $memeRepository->findAll();

        return $this->render('meme/index.html.twig', [
            'controller_name' => 'MemeController',
            'memes' => $memes,
        ]);
    }

    #[Route('/memes/create', name: 'app_meme_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $meme = new Meme();
        $form = $this->createForm(MemeformType::class, $meme);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($meme);
            $entityManager->flush();

            return $this->redirectToRoute('app_meme');
        }

        return $this->render('meme/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
