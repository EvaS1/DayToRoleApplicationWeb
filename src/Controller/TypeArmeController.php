<?php

namespace App\Controller;

use App\Entity\TypeArme;
use App\Form\TypeArmeType;
use App\Repository\TypeArmeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/arme")
 */
class TypeArmeController extends AbstractController
{
    /**
     * @Route("/", name="type_arme_index", methods={"GET"})
     */
    public function index(TypeArmeRepository $typeArmeRepository): Response
    {
        return $this->render('admin/type_arme/index.html.twig', [
            'type_armes' => $typeArmeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_arme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeArme = new TypeArme();
        $form = $this->createForm(TypeArmeType::class, $typeArme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeArme);
            $entityManager->flush();

            return $this->redirectToRoute('type_arme_index');
        }

        return $this->render('type_arme/new.html.twig', [
            'type_arme' => $typeArme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_arme_show", methods={"GET"})
     */
    public function show(TypeArme $typeArme): Response
    {
        return $this->render('type_arme/show.html.twig', [
            'type_arme' => $typeArme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_arme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeArme $typeArme): Response
    {
        $form = $this->createForm(TypeArmeType::class, $typeArme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_arme_index');
        }

        return $this->render('type_arme/edit.html.twig', [
            'type_arme' => $typeArme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_arme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeArme $typeArme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeArme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeArme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_arme_index');
    }
}
