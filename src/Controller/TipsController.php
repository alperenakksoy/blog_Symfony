<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TipsController extends AbstractController
{
    #[Route('/travel-tips', name: 'tips')]
public function index(){
        return $this->render('travelTips/travel-tips.html.twig');
    }
}
