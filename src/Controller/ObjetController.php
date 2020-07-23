<?php

namespace App\Controller;

use App\Entity\Objet;
use App\Form\ObjetType;
use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/objet")
 */
class ObjetController extends AbstractController
{
    /**
     * @Route("/", name="objet_index", methods={"GET"})
     */
    public function index(ObjetRepository $objetRepository): Response
    {
        return $this->render('admin/objet/index.html.twig', [
            'objets' => $objetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="objet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $objet = new Objet();
        $form = $this->createForm(ObjetType::class, $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objet);
            $entityManager->flush();

            return $this->redirectToRoute('objet_index');
        }

        return $this->render('objet/new.html.twig', [
            'objet' => $objet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objet_show", methods={"GET"})
     */
    public function show(Objet $objet): Response
    {
        return $this->render('objet/show.html.twig', [
            'objet' => $objet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="objet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Objet $objet): Response
    {
        $form = $this->createForm(ObjetType::class, $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objet_index');
        }

        return $this->render('objet/edit.html.twig', [
            'objet' => $objet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Objet $objet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objet_index');
    }
}
