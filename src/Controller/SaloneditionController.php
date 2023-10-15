<?php

namespace App\Controller;

use App\Entity\Salonedition;
use App\Form\SaloneditionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salonedition")
 */
class SaloneditionController extends AbstractController
{
    /**
     * @Route("/", name="salonedition_index", methods={"GET"})
     */
    public function index(): Response
    {
        $saloneditions = $this->getDoctrine()
            ->getRepository(Salonedition::class)
            ->findAll();

        return $this->render('salonedition/index.html.twig', [
            'saloneditions' => $saloneditions,
        ]);
    }

    /**
     * @Route("/new", name="salonedition_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $salonedition = new Salonedition();
        $form = $this->createForm(SaloneditionType::class, $salonedition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salonedition);
            $entityManager->flush();

            return $this->redirectToRoute('salonedition_index');
        }

        return $this->render('salonedition/new.html.twig', [
            'salonedition' => $salonedition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{editionrefrence}", name="salonedition_show", methods={"GET"})
     */
    public function show(Salonedition $salonedition): Response
    {
        return $this->render('salonedition/show.html.twig', [
            'salonedition' => $salonedition,
        ]);
    }

    /**
     * @Route("/{editionrefrence}/edit", name="salonedition_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Salonedition $salonedition): Response
    {
        $form = $this->createForm(SaloneditionType::class, $salonedition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salonedition_index');
        }

        return $this->render('salonedition/edit.html.twig', [
            'salonedition' => $salonedition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{editionrefrence}", name="salonedition_delete", methods={"POST"})
     */
    public function delete(Request $request, Salonedition $salonedition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salonedition->getEditionrefrence(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salonedition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('salonedition_index');
    }
}
