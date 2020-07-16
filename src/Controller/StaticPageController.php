<?php
namespace App\Controller;

use App\Entity\ArticleBlog;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleBlogRepository;

class StaticPageController extends AbstractController
{
	/**
    * @Route("/connexion", name="connexion")
    */
    public function displayConnexion()
    {
        return $this->render('connexion.html.twig');
    }

	/**
    * @Route("/notre-offre-aide-au-jeu-de-role", name="notreoffre")
    */
    public function displayNotreOffre()
    {
        return $this->render('notreoffre.html.twig');
    }

	/**
    * @Route("/definition-jeu-de-role", name="jeuderole")
    */
    public function displayJeudeRole()
    {
        return $this->render('jeuderole.html.twig');
    }

    /**
    * @Route("/les-scenarios", name="scenarios")
    */
    public function displayScenarios()
    {
        return $this->render('scenarios.html.twig');
    }

    /**
    * @Route("/qui-sommes-nous", name="equipe")
    */
    public function displayEquipe()
    {
        return $this->render('equipe.html.twig');
    }

    /**
    * @Route("/plan-site", name="plan")
    */
    public function displayPlanSite()
    {
        $articleBlogRepository = $this
            ->getDoctrine()
            ->getRepository(ArticleBlog::class);

        $articles = $articleBlogRepository->findAllOrderedByDate();
        return $this->render('plansite.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
    * @Route("/politique-confidentialite", name="confidentialite")
    */
    public function displayPolitiqueConfidentialite()
    {
        return $this->render('confidentialite.html.twig');
    }

    /**
    * @Route("/conditions-generales-utilisation", name="cgu")
    */
    public function displayCGU()
    {
        return $this->render('cgu.html.twig');
    }
}
?>