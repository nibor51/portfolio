<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WorkRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(WorkRepository $work): Response
    {
        return $this->render('home/index.html.twig', [
            'works' => $work->findAll(),
        ]);
    }
}
