<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vaporiser;
use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\UserRepository;
use App\Service\ImageUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'app_user_')]
class UserController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'list')]
    public function userList(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAllExcludingDeleted();

        return $this->render('user/list.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/{id<\d+>}', name: 'detail')]
    public function wishDetail(User $user): Response
    {
        return $this->render('user/detail.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/vaporiser/{id<\d+>}', name: 'vaporiser', methods: ['POST'])]
    public function vaporiser(Request $request, User $user): Response
    {
        $vaporiser = new Vaporiser();

        $vaporiser->setId($user->getId());
        $vaporiser->setEmail($user->getEmail());

        $this->entityManager->persist($vaporiser);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_user_list');
    }
}
