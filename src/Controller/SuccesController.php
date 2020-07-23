<?php

namespace App\Controller;

use App\Entity\Succes;
use App\Form\SuccesType;
use App\Repository\SuccesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/succes")
 */
class SuccesController extends AbstractController
{
    /**
     * @Route("/", name="succes_index", methods={"GET"})
     */
    public function index(SuccesRepository $succesRepository): Response
    {
        return $this->render('admin/succes/index.html.twig', [
            'succes' => $succesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="succes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $succe = new Succes();
        $form = $this->createForm(SuccesType::class, $succe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($succe);
            $entityManager->flush();

            return $this->redirectToRoute('succes_index');
        }

        return $this->render('succes/new.html.twig', [
            'succe' => $succe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="succes_show", methods={"GET"})
     */
    public function show(Succes $succe): Response
    {
        return $this->render('succes/show.html.twig', [
            'succe' => $succe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="succes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Succes $succe): Response
    {
        $form = $this->createForm(SuccesType::class, $succe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('succes_index');
        }

        return $this->render('succes/edit.html.twig', [
            'succe' => $succe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="succes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Succes $succe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$succe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($succe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('succes_index');
    }
}
