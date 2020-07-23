<?php

namespace App\Controller;

use App\Entity\Statistiques;
use App\Form\StatistiquesType;
use App\Repository\StatistiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/statistiques")
 */
class StatistiquesController extends AbstractController
{
    /**
     * @Route("/", name="statistiques_index", methods={"GET"})
     */
    public function index(StatistiquesRepository $statistiquesRepository): Response
    {
        return $this->render('admin/statistiques/index.html.twig', [
            'statistiques' => $statistiquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="statistiques_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $statistique = new Statistiques();
        $form = $this->createForm(StatistiquesType::class, $statistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($statistique);
            $entityManager->flush();

            return $this->redirectToRoute('statistiques_index');
        }

        return $this->render('statistiques/new.html.twig', [
            'statistique' => $statistique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="statistiques_show", methods={"GET"})
     */
    public function show(Statistiques $statistique): Response
    {
        return $this->render('statistiques/show.html.twig', [
            'statistique' => $statistique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="statistiques_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Statistiques $statistique): Response
    {
        $form = $this->createForm(StatistiquesType::class, $statistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('statistiques_index');
        }

        return $this->render('statistiques/edit.html.twig', [
            'statistique' => $statistique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="statistiques_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Statistiques $statistique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statistique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($statistique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('statistiques_index');
    }
}
