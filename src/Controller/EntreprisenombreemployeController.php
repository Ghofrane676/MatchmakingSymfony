<?php

namespace App\Controller;

use App\Entity\Entreprisenombreemploye;
use App\Form\EntreprisenombreemployeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprisenombreemploye")
 */
class EntreprisenombreemployeController extends AbstractController
{
    /**
     * @Route("/", name="entreprisenombreemploye_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entreprisenombreemployes = $this->getDoctrine()
            ->getRepository(Entreprisenombreemploye::class)
            ->findAll();

        return $this->render('entreprisenombreemploye/index.html.twig', [
            'entreprisenombreemployes' => $entreprisenombreemployes,
        ]);
    }

    /**
     * @Route("/new", name="entreprisenombreemploye_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entreprisenombreemploye = new Entreprisenombreemploye();
        $form = $this->createForm(EntreprisenombreemployeType::class, $entreprisenombreemploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprisenombreemploye);
            $entityManager->flush();

            return $this->redirectToRoute('entreprisenombreemploye_index');
        }

        return $this->render('entreprisenombreemploye/new.html.twig', [
            'entreprisenombreemploye' => $entreprisenombreemploye,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{reference}", name="entreprisenombreemploye_show", methods={"GET"})
     */
    public function show(Entreprisenombreemploye $entreprisenombreemploye): Response
    {
        return $this->render('entreprisenombreemploye/show.html.twig', [
            'entreprisenombreemploye' => $entreprisenombreemploye,
        ]);
    }

    /**
     * @Route("/{reference}/edit", name="entreprisenombreemploye_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entreprisenombreemploye $entreprisenombreemploye): Response
    {
        $form = $this->createForm(EntreprisenombreemployeType::class, $entreprisenombreemploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entreprisenombreemploye_index');
        }

        return $this->render('entreprisenombreemploye/edit.html.twig', [
            'entreprisenombreemploye' => $entreprisenombreemploye,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{reference}", name="entreprisenombreemploye_delete", methods={"POST"})
     */
    public function delete(Request $request, Entreprisenombreemploye $entreprisenombreemploye): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entreprisenombreemploye->getReference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entreprisenombreemploye);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entreprisenombreemploye_index');
    }
}
