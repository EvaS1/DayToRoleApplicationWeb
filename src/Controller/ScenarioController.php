<?php

namespace App\Controller;

use App\Entity\Scenario;
use App\Form\ScenarioType;
use App\Repository\ScenarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scenario")
 */
class ScenarioController extends AbstractController
{
    /**
     * @Route("/", name="scenario_index", methods={"GET"})
     */
    public function index(ScenarioRepository $scenarioRepository): Response
    {
        return $this->render('admin/scenario/index.html.twig', [
            'scenarios' => $scenarioRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scenario_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scenario = new Scenario();
        $form = $this->createForm(ScenarioType::class, $scenario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scenario);
            $entityManager->flush();

            return $this->redirectToRoute('scenario_index');
        }

        return $this->render('scenario/new.html.twig', [
            'scenario' => $scenario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scenario_show", methods={"GET"})
     */
    public function show(Scenario $scenario): Response
    {
        return $this->render('scenario/show.html.twig', [
            'scenario' => $scenario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scenario_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Scenario $scenario): Response
    {
        $form = $this->createForm(ScenarioType::class, $scenario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scenario_index');
        }

        return $this->render('scenario/edit.html.twig', [
            'scenario' => $scenario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scenario_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Scenario $scenario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scenario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scenario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scenario_index');
    }
}
