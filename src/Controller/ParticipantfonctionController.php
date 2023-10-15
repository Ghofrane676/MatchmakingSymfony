<?php

namespace App\Controller;

use App\Entity\Participantfonction;
use App\Form\ParticipantfonctionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/participantfonction")
 */
class ParticipantfonctionController extends AbstractController
{
    /**
     * @Route("/", name="participantfonction_index", methods={"GET"})
     */
    public function index(): Response
    {
        $participantfonctions = $this->getDoctrine()
            ->getRepository(Participantfonction::class)
            ->findAll();

        return $this->render('participantfonction/index.html.twig', [
            'participantfonctions' => $participantfonctions,
        ]);
    }

    /**
     * @Route("/new", name="participantfonction_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $participantfonction = new Participantfonction();
        $form = $this->createForm(ParticipantfonctionType::class, $participantfonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participantfonction);
            $entityManager->flush();

            return $this->redirectToRoute('participantfonction_index');
        }

        return $this->render('participantfonction/new.html.twig', [
            'participantfonction' => $participantfonction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{fonctionreference}", name="participantfonction_show", methods={"GET"})
     */
    public function show(Participantfonction $participantfonction): Response
    {
        return $this->render('participantfonction/show.html.twig', [
            'participantfonction' => $participantfonction,
        ]);
    }

    /**
     * @Route("/{fonctionreference}/edit", name="participantfonction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Participantfonction $participantfonction): Response
    {
        $form = $this->createForm(ParticipantfonctionType::class, $participantfonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('participantfonction_index');
        }

        return $this->render('participantfonction/edit.html.twig', [
            'participantfonction' => $participantfonction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{fonctionreference}", name="participantfonction_delete", methods={"POST"})
     */
    public function delete(Request $request, Participantfonction $participantfonction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$participantfonction->getFonctionreference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($participantfonction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('participantfonction_index');
    }
}
