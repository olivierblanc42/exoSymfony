<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/admin/home')]

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_back_home')]
    public function index(): Response
    {
        return $this->render('back/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
