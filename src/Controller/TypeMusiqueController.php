<?php

namespace App\Controller;

use App\Entity\TypeMusique;
use App\Form\TypeMusiqueType;
use App\Repository\TypeMusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/musique")
 */
class TypeMusiqueController extends AbstractController
{
    /**
     * @Route("/", name="type_musique_index", methods={"GET"})
     */
    public function index(TypeMusiqueRepository $typeMusiqueRepository): Response
    {
        return $this->render('admin/type_musique/index.html.twig', [
            'type_musiques' => $typeMusiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_musique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeMusique = new TypeMusique();
        $form = $this->createForm(TypeMusiqueType::class, $typeMusique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeMusique);
            $entityManager->flush();

            return $this->redirectToRoute('type_musique_index');
        }

        return $this->render('type_musique/new.html.twig', [
            'type_musique' => $typeMusique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_musique_show", methods={"GET"})
     */
    public function show(TypeMusique $typeMusique): Response
    {
        return $this->render('type_musique/show.html.twig', [
            'type_musique' => $typeMusique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_musique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeMusique $typeMusique): Response
    {
        $form = $this->createForm(TypeMusiqueType::class, $typeMusique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_musique_index');
        }

        return $this->render('type_musique/edit.html.twig', [
            'type_musique' => $typeMusique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_musique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeMusique $typeMusique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeMusique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeMusique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_musique_index');
    }
}
