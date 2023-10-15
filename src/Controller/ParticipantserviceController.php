<?php

namespace App\Controller;

use App\Entity\Participantservice;
use App\Form\ParticipantserviceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/participantservice")
 */
class ParticipantserviceController extends AbstractController
{
    /**
     * @Route("/", name="participantservice_index", methods={"GET"})
     */
    public function index(): Response
    {
        $participantservices = $this->getDoctrine()
            ->getRepository(Participantservice::class)
            ->findAll();

        return $this->render('participantservice/index.html.twig', [
            'participantservices' => $participantservices,
        ]);
    }

    /**
     * @Route("/new", name="participantservice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $participantservice = new Participantservice();
        $form = $this->createForm(ParticipantserviceType::class, $participantservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participantservice);
            $entityManager->flush();

            return $this->redirectToRoute('participantservice_index');
        }

        return $this->render('participantservice/new.html.twig', [
            'participantservice' => $participantservice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{reference}", name="participantservice_show", methods={"GET"})
     */
    public function show(Participantservice $participantservice): Response
    {
        return $this->render('participantservice/show.html.twig', [
            'participantservice' => $participantservice,
        ]);
    }

    /**
     * @Route("/{reference}/edit", name="participantservice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Participantservice $participantservice): Response
    {
        $form = $this->createForm(ParticipantserviceType::class, $participantservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('participantservice_index');
        }

        return $this->render('participantservice/edit.html.twig', [
            'participantservice' => $participantservice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{reference}", name="participantservice_delete", methods={"POST"})
     */
    public function delete(Request $request, Participantservice $participantservice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$participantservice->getReference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($participantservice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('participantservice_index');
    }
}
