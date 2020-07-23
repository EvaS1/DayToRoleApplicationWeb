<?php

namespace App\Controller;

use App\Entity\SupportVisuel;
use App\Form\SupportVisuelType;
use App\Repository\SupportVisuelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/support/visuel")
 */
class SupportVisuelController extends AbstractController
{
    /**
     * @Route("/", name="support_visuel_index", methods={"GET"})
     */
    public function index(SupportVisuelRepository $supportVisuelRepository): Response
    {
        return $this->render('admin/support_visuel/index.html.twig', [
            'support_visuels' => $supportVisuelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="support_visuel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $supportVisuel = new SupportVisuel();
        $form = $this->createForm(SupportVisuelType::class, $supportVisuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($supportVisuel);
            $entityManager->flush();

            return $this->redirectToRoute('support_visuel_index');
        }

        return $this->render('support_visuel/new.html.twig', [
            'support_visuel' => $supportVisuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="support_visuel_show", methods={"GET"})
     */
    public function show(SupportVisuel $supportVisuel): Response
    {
        return $this->render('support_visuel/show.html.twig', [
            'support_visuel' => $supportVisuel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="support_visuel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SupportVisuel $supportVisuel): Response
    {
        $form = $this->createForm(SupportVisuelType::class, $supportVisuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('support_visuel_index');
        }

        return $this->render('support_visuel/edit.html.twig', [
            'support_visuel' => $supportVisuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="support_visuel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SupportVisuel $supportVisuel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$supportVisuel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($supportVisuel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('support_visuel_index');
    }
}
