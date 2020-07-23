<?php

namespace App\Controller;

use App\Entity\Difficulte;
use App\Form\DifficulteType;
use App\Repository\DifficulteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/difficulte")
 */
class DifficulteController extends AbstractController
{
    /**
     * @Route("/", name="difficulte_index", methods={"GET"})
     */
    public function index(DifficulteRepository $difficulteRepository): Response
    {
        return $this->render('admin/difficulte/index.html.twig', [
            'difficultes' => $difficulteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="difficulte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $difficulte = new Difficulte();
        $form = $this->createForm(DifficulteType::class, $difficulte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($difficulte);
            $entityManager->flush();

            return $this->redirectToRoute('difficulte_index');
        }

        return $this->render('difficulte/new.html.twig', [
            'difficulte' => $difficulte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="difficulte_show", methods={"GET"})
     */
    public function show(Difficulte $difficulte): Response
    {
        return $this->render('difficulte/show.html.twig', [
            'difficulte' => $difficulte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="difficulte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Difficulte $difficulte): Response
    {
        $form = $this->createForm(DifficulteType::class, $difficulte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('difficulte_index');
        }

        return $this->render('difficulte/edit.html.twig', [
            'difficulte' => $difficulte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="difficulte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Difficulte $difficulte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$difficulte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($difficulte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('difficulte_index');
    }
}
