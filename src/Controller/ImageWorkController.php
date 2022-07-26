<?php

namespace App\Controller;

use App\Entity\ImageWork;
use App\Form\ImageWorkType;
use App\Repository\ImageWorkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/image/work')]
class ImageWorkController extends AbstractController
{
    #[Route('/', name: 'image_work_index', methods: ['GET'])]
    public function index(ImageWorkRepository $imageWorkRepository): Response
    {
        return $this->render('image_work/index.html.twig', [
            'image_works' => $imageWorkRepository->findAll(),
        ]);
    }

    #[Route('/api', name: 'image_work_api', methods: ['GET'])]
    public function api(ImageWorkRepository $imageWorkRepository): Response
    {
        return $this->json($imageWorkRepository->findAll(), 200, [], ['groups' => 'image_work:read']);
    }

    #[Route('/new', name: 'image_work_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $imageWork = new ImageWork();
        $form = $this->createForm(ImageWorkType::class, $imageWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($imageWork);
            $entityManager->flush();

            return $this->redirectToRoute('image_work_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('image_work/new.html.twig', [
            'image_work' => $imageWork,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'image_work_show', methods: ['GET'])]
    public function show(ImageWork $imageWork): Response
    {
        return $this->render('image_work/show.html.twig', [
            'image_work' => $imageWork,
        ]);
    }

    #[Route('/{id}/edit', name: 'image_work_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImageWork $imageWork, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ImageWorkType::class, $imageWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('image_work_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('image_work/edit.html.twig', [
            'image_work' => $imageWork,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'image_work_delete', methods: ['POST'])]
    public function delete(Request $request, ImageWork $imageWork, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imageWork->getId(), $request->request->get('_token'))) {
            $entityManager->remove($imageWork);
            $entityManager->flush();
        }

        return $this->redirectToRoute('image_work_index', [], Response::HTTP_SEE_OTHER);
    }
}