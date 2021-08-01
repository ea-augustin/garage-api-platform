<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IdentifyController extends AbstractController
{
    #[Route('/api/current-user', name: 'identify')]
    public function index(): Response
    {
        return $this->json($this->getUser());
    }
}
