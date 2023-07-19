<?php

namespace App\Controller;

use App\Entity\CategorieChambres;
use App\Form\CategorieChambresType;
use App\Repository\CategorieChambresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie/chambres')]
class CategorieChambresController extends AbstractController
{
    #[Route('/', name: 'app_categorie_chambres_index', methods: ['GET'])]
    public function index(CategorieChambresRepository $categorieChambresRepository): Response
    {
        return $this->render('categorie_chambres/index.html.twig', [
            'categorie_chambres' => $categorieChambresRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie_chambres_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorieChambre = new CategorieChambres();
        $form = $this->createForm(CategorieChambresType::class, $categorieChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categorieChambre);
            $entityManager->flush();

            return $this->redirectToRoute('app_chambres_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_chambres/new.html.twig', [
            'categorie_chambre' => $categorieChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_chambres_show', methods: ['GET'])]
    public function show(CategorieChambres $categorieChambre): Response
    {
        return $this->render('categorie_chambres/show.html.twig', [
            'categorie_chambre' => $categorieChambre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie_chambres_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieChambres $categorieChambre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorieChambresType::class, $categorieChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_chambres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_chambres/edit.html.twig', [
            'categorie_chambre' => $categorieChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_chambres_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieChambres $categorieChambre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieChambre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($categorieChambre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categorie_chambres_index', [], Response::HTTP_SEE_OTHER);
    }
}
