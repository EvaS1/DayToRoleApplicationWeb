<?php

namespace App\Controller;

use App\Entity\ArticleBlog;
use App\Entity\CategorieArticle;
use App\Form\ArticleBlogType;
use App\Repository\ArticleBlogRepository;
use App\Repository\CategorieArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleBlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog", methods={"GET"})
     */
    public function index(ArticleBlogRepository $articleBlogRepository): Response
    {
        return $this->render('blog.html.twig', [
            'articles' => $articleBlogRepository->findAllOrderedByDate()
        ]);
    }

    /**
     * @Route("/new", name="article_blog_new", methods={"GET","POST"})
     */
    /*public function new(Request $request): Response
    {
        $articleBlog = new ArticleBlog();
        $form = $this->createForm(ArticleBlogType::class, $articleBlog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($articleBlog);
            $entityManager->flush();

            return $this->redirectToRoute('article_blog_index');
        }

        return $this->render('article_blog/new.html.twig', [
            'article_blog' => $articleBlog,
            'form' => $form->createView(),
        ]);
    }*/

    /**
     * @Route("blog/article/{slug}", name="blog_post", methods={"GET"})
     */
    public function show($slug): Response
    {
        $article = $this->getDoctrine()->getRepository(ArticleBlog::class)->findOneBy(['slug' => $slug]);
       
        if(!$article){
            throw $this->createNotFoundException('L\'article n\'existe pas');
        }

        return $this->render('article.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("blog/categorie/{idCategorie}", name="article_by_category", methods={"GET"})
     */
    public function displayArticleByCategory($idCategorie): Response
    {
        $articles = $this->getDoctrine()->getRepository(ArticleBlog::class)->findByIdCategorie($idCategorie);
       
        if(!$articles){
            throw $this->createNotFoundException('Aucun article dans cette catégorie');
        }

        $categorie = $this->getDoctrine()->getRepository(CategorieArticle::class)->findOneById($idCategorie);

        return $this->render('categorie.html.twig', [
            'articles' => $articles,
            'categorie' => $categorie
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_blog_edit", methods={"GET","POST"})
     */
    /*public function edit(Request $request, ArticleBlog $articleBlog): Response
    {
        $form = $this->createForm(ArticleBlogType::class, $articleBlog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_blog_index');
        }

        return $this->render('article_blog/edit.html.twig', [
            'article_blog' => $articleBlog,
            'form' => $form->createView(),
        ]);
    }*/

    /**
     * @Route("/{id}", name="article_blog_delete", methods={"DELETE"})
     */
    /*public function delete(Request $request, ArticleBlog $articleBlog): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleBlog->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($articleBlog);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_blog_index');
    }*/
}
