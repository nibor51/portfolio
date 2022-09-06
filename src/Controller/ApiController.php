<?php

namespace App\Controller;

use App\Entity\ImageWork;
use App\Form\ImageWorkType;
use App\Repository\ImageWorkRepository;
use App\Entity\Work;
use App\Form\WorkType;
use App\Repository\WorkRepository;
use App\Entity\Tech;
use App\Form\TechType;
use App\Repository\TechRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/work', name: 'work_api', methods: ['GET'])]
    public function work(WorkRepository $workRepository): Response
    {
        return $this->json($workRepository->findAll(), 200, [], ['groups' => 'work:read']);
    }

    #[Route('/image', name: 'image_work_api', methods: ['GET'])]
    public function image(ImageWorkRepository $imageWorkRepository): Response
    {
        return $this->json($imageWorkRepository->findAll(), 200, [], ['groups' => 'image_work:read']);
    }
    
    #[Route('/tech', name: 'tech_api', methods: ['GET'])]
    public function tech(TechRepository $techRepository): Response
    {
        return $this->json($techRepository->findAll(), 200, [], ['groups' => 'tech:read']);
    }

}