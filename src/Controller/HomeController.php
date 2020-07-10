<?php
namespace App\Controller;

use App\Entity\ArticleBlog;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleBlogRepository;

class HomeController extends AbstractController
{
	/**
    * @Route("/", name="home")
    */
    public function displayHome()
    {
        $welcomeMessage = "Bienvenue sur Day To Role !";

        $articleBlogRepository = $this
            ->getDoctrine()
            ->getRepository(ArticleBlog::class);

        $articles = $articleBlogRepository->findLastPublishedArticles(3);
        return $this->render('home.html.twig', [
            'welcome' => $welcomeMessage,
            'articles' => $articles,
        ]);
    }
}
?>