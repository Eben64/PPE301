<?php

namespace App\Controller;

use App\Entity\Motel;
use App\Form\MotelType;
use App\Repository\MotelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/motel')]
class MotelController extends AbstractController
{
    #[Route('/', name: 'app_motel_index', methods: ['GET'])]
    public function index(MotelRepository $motelRepository): Response
    {
        return $this->render('motel/index.html.twig', [
            'motels' => $motelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_motel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $motel = new Motel();
        $form = $this->createForm(MotelType::class, $motel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motel);
            $entityManager->flush();

            return $this->redirectToRoute('app_motel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motel/new.html.twig', [
            'motel' => $motel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_motel_show', methods: ['GET'])]
    public function show(Motel $motel): Response
    {
        return $this->render('motel/show.html.twig', [
            'motel' => $motel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_motel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Motel $motel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MotelType::class, $motel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_motel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motel/edit.html.twig', [
            'motel' => $motel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_motel_delete', methods: ['POST'])]
    public function delete(Request $request, Motel $motel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motel->getId(), $request->request->get('_token'))) {
            $entityManager->remove($motel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_motel_index', [], Response::HTTP_SEE_OTHER);
    }
}
