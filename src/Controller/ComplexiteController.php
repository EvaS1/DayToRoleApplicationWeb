<?php

namespace App\Controller;

use App\Entity\Complexite;
use App\Form\ComplexiteType;
use App\Repository\ComplexiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/complexite")
 */
class ComplexiteController extends AbstractController
{
    /**
     * @Route("/", name="complexite_index", methods={"GET"})
     */
    public function index(ComplexiteRepository $complexiteRepository): Response
    {
        return $this->render('admin/complexite/index.html.twig', [
            'complexites' => $complexiteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="complexite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $complexite = new Complexite();
        $form = $this->createForm(ComplexiteType::class, $complexite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($complexite);
            $entityManager->flush();

            return $this->redirectToRoute('complexite_index');
        }

        return $this->render('complexite/new.html.twig', [
            'complexite' => $complexite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complexite_show", methods={"GET"})
     */
    public function show(Complexite $complexite): Response
    {
        return $this->render('complexite/show.html.twig', [
            'complexite' => $complexite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="complexite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Complexite $complexite): Response
    {
        $form = $this->createForm(ComplexiteType::class, $complexite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('complexite_index');
        }

        return $this->render('complexite/edit.html.twig', [
            'complexite' => $complexite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complexite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Complexite $complexite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$complexite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($complexite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('complexite_index');
    }
}
