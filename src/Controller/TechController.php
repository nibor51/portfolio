<?php

namespace App\Controller;

use App\Entity\Tech;
use App\Form\TechType;
use App\Repository\TechRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/tech')]
class TechController extends AbstractController
{
    #[Route('/', name: 'tech_index', methods: ['GET'])]
    public function index(TechRepository $techRepository): Response
    {
        return $this->render('tech/index.html.twig', [
            'teches' => $techRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'tech_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tech = new Tech();
        $form = $this->createForm(TechType::class, $tech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tech);
            $entityManager->flush();

            return $this->redirectToRoute('tech_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tech/new.html.twig', [
            'tech' => $tech,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tech_show', methods: ['GET'])]
    public function show(Tech $tech): Response
    {
        return $this->render('tech/show.html.twig', [
            'tech' => $tech,
        ]);
    }

    #[Route('/{id}/edit', name: 'tech_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tech $tech, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TechType::class, $tech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tech_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tech/edit.html.twig', [
            'tech' => $tech,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tech_delete', methods: ['POST'])]
    public function delete(Request $request, Tech $tech, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tech->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tech);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tech_index', [], Response::HTTP_SEE_OTHER);
    }
}
