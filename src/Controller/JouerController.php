<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

Class JouerController extends AbstractController
{
    /**
     * @Route("/jouer", name="jouer")
     */
    public function displayJouer()
    {
        return $this->render('jouer.html.twig');
    }
}