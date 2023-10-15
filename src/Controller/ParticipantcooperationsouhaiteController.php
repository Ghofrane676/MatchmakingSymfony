<?php

namespace App\Controller;

use App\Entity\Participantcooperationsouhaite;
use App\Form\ParticipantcooperationsouhaiteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/participantcooperationsouhaite")
 */
class ParticipantcooperationsouhaiteController extends AbstractController
{
    /**
     * @Route("/", name="participantcooperationsouhaite_index", methods={"GET"})
     */
    public function index(): Response
    {
        $participantcooperationsouhaites = $this->getDoctrine()
            ->getRepository(Participantcooperationsouhaite::class)
            ->findAll();

        return $this->render('participantcooperationsouhaite/index.html.twig', [
            'participantcooperationsouhaites' => $participantcooperationsouhaites,
        ]);
    }

    /**
     * @Route("/new", name="participantcooperationsouhaite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $participantcooperationsouhaite = new Participantcooperationsouhaite();
        $form = $this->createForm(ParticipantcooperationsouhaiteType::class, $participantcooperationsouhaite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participantcooperationsouhaite);
            $entityManager->flush();

            return $this->redirectToRoute('participantcooperationsouhaite_index');
        }

        return $this->render('participantcooperationsouhaite/new.html.twig', [
            'participantcooperationsouhaite' => $participantcooperationsouhaite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{coopsouhaitereference}", name="participantcooperationsouhaite_show", methods={"GET"})
     */
    public function show(Participantcooperationsouhaite $participantcooperationsouhaite): Response
    {
        return $this->render('participantcooperationsouhaite/show.html.twig', [
            'participantcooperationsouhaite' => $participantcooperationsouhaite,
        ]);
    }

    /**
     * @Route("/{coopsouhaitereference}/edit", name="participantcooperationsouhaite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Participantcooperationsouhaite $participantcooperationsouhaite): Response
    {
        $form = $this->createForm(ParticipantcooperationsouhaiteType::class, $participantcooperationsouhaite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('participantcooperationsouhaite_index');
        }

        return $this->render('participantcooperationsouhaite/edit.html.twig', [
            'participantcooperationsouhaite' => $participantcooperationsouhaite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{coopsouhaitereference}", name="participantcooperationsouhaite_delete", methods={"POST"})
     */
    public function delete(Request $request, Participantcooperationsouhaite $participantcooperationsouhaite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$participantcooperationsouhaite->getCoopsouhaitereference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($participantcooperationsouhaite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('participantcooperationsouhaite_index');
    }
}
