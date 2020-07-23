<?php

namespace App\Controller;

use App\Entity\Musique;
use App\Form\MusiqueType;
use App\Repository\MusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/musique")
 */
class MusiqueController extends AbstractController
{
    /**
     * @Route("/", name="musique_index", methods={"GET"})
     */
    public function index(MusiqueRepository $musiqueRepository): Response
    {
        return $this->render('admin/musique/index.html.twig', [
            'musiques' => $musiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="musique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $musique = new Musique();
        $form = $this->createForm(MusiqueType::class, $musique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($musique);
            $entityManager->flush();

            return $this->redirectToRoute('musique_index');
        }

        return $this->render('musique/new.html.twig', [
            'musique' => $musique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="musique_show", methods={"GET"})
     */
    public function show(Musique $musique): Response
    {
        return $this->render('musique/show.html.twig', [
            'musique' => $musique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="musique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Musique $musique): Response
    {
        $form = $this->createForm(MusiqueType::class, $musique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('musique_index');
        }

        return $this->render('musique/edit.html.twig', [
            'musique' => $musique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="musique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Musique $musique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$musique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($musique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('musique_index');
    }
}
