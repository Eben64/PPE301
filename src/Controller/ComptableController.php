<?php

namespace App\Controller;

use App\Entity\Comptable;
use App\Form\ComptableType;
use App\Repository\ComptableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comptable')]
class ComptableController extends AbstractController
{
    #[Route('/', name: 'app_comptable_index', methods: ['GET'])]
    public function index(ComptableRepository $comptableRepository): Response
    {
        return $this->render('comptable/index.html.twig', [
            'comptables' => $comptableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_comptable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comptable = new Comptable();
        $form = $this->createForm(ComptableType::class, $comptable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comptable);
            $entityManager->flush();

            return $this->redirectToRoute('app_comptable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptable/new.html.twig', [
            'comptable' => $comptable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comptable_show', methods: ['GET'])]
    public function show(Comptable $comptable): Response
    {
        return $this->render('comptable/show.html.twig', [
            'comptable' => $comptable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_comptable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comptable $comptable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ComptableType::class, $comptable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_comptable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptable/edit.html.twig', [
            'comptable' => $comptable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comptable_delete', methods: ['POST'])]
    public function delete(Request $request, Comptable $comptable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comptable->getId(), $request->request->get('_token'))) {
            $entityManager->remove($comptable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comptable_index', [], Response::HTTP_SEE_OTHER);
    }
}
