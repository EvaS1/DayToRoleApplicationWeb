<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
	/**
    * @Route("/", name="home")
    */
    public function displayHome()
    {
        $welcomeMessage = "Bienvenue sur Day To Role !";

        return $this->render('home.html.twig', [
            'welcome' => $welcomeMessage,
        ]);
    }
}
?>