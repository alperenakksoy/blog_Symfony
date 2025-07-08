<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DestinationsController extends AbstractController
{
    #[Route('/destinations', name: 'destinations')]
    public function index(){
       return $this->render('destinations/destinations.html.twig',[

       ]);
    }
}
