<?php

namespace App\Controller;

use App\Entity\Lore;
use App\Form\LoreType;
use App\Repository\LoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lore")
 */
class LoreController extends AbstractController
{
    /**
     * @Route("/", name="lore_index", methods={"GET"})
     */
    public function index(LoreRepository $loreRepository): Response
    {
        return $this->render('admin/lore/index.html.twig', [
            'lores' => $loreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lore_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lore = new Lore();
        $form = $this->createForm(LoreType::class, $lore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lore);
            $entityManager->flush();

            return $this->redirectToRoute('lore_index');
        }

        return $this->render('lore/new.html.twig', [
            'lore' => $lore,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lore_show", methods={"GET"})
     */
    public function show(Lore $lore): Response
    {
        return $this->render('lore/show.html.twig', [
            'lore' => $lore,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lore_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lore $lore): Response
    {
        $form = $this->createForm(LoreType::class, $lore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lore_index');
        }

        return $this->render('lore/edit.html.twig', [
            'lore' => $lore,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lore_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lore $lore): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lore->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lore);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lore_index');
    }
}
