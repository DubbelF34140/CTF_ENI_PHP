<?php

namespace App\Controller;

use App\Entity\Axe;
use App\Form\AxeformType;
use App\Repository\AxeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/comment', name: 'app_axe')]
class AxeController extends AbstractController
{
    #[Route('')]
    public function index(AxeRepository $axeRepository): Response
    {
        $axelist = $axeRepository->findAll();

        return $this->render('axe/index.html.twig', [
            'controller_name' => 'AxeController',
            'axes' => $axelist,
        ]);
    }

    #[IsGranted("ROLE_USER")]
    #[Route('/create', name: '_create')]
    public function create(Request $request,EntityManagerInterface $entityManager): Response
    {
        $comment = new Axe();
        $form = $this->createForm(AxeformType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Merci pour votre commentaire');
            return $this->redirectToRoute('app_axeapp_axe_index');
        }


        return $this->render('axe/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
