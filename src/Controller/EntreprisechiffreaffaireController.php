<?php

namespace App\Controller;

use App\Entity\Entreprisechiffreaffaire;
use App\Form\EntreprisechiffreaffaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprisechiffreaffaire")
 */
class EntreprisechiffreaffaireController extends AbstractController
{
    /**
     * @Route("/", name="entreprisechiffreaffaire_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entreprisechiffreaffaires = $this->getDoctrine()
            ->getRepository(Entreprisechiffreaffaire::class)
            ->findAll();

        return $this->render('entreprisechiffreaffaire/index.html.twig', [
            'entreprisechiffreaffaires' => $entreprisechiffreaffaires,
        ]);
    }

    /**
     * @Route("/new", name="entreprisechiffreaffaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entreprisechiffreaffaire = new Entreprisechiffreaffaire();
        $form = $this->createForm(EntreprisechiffreaffaireType::class, $entreprisechiffreaffaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprisechiffreaffaire);
            $entityManager->flush();

            return $this->redirectToRoute('entreprisechiffreaffaire_index');
        }

        return $this->render('entreprisechiffreaffaire/new.html.twig', [
            'entreprisechiffreaffaire' => $entreprisechiffreaffaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{chiffreaffairereference}", name="entreprisechiffreaffaire_show", methods={"GET"})
     */
    public function show(Entreprisechiffreaffaire $entreprisechiffreaffaire): Response
    {
        return $this->render('entreprisechiffreaffaire/show.html.twig', [
            'entreprisechiffreaffaire' => $entreprisechiffreaffaire,
        ]);
    }

    /**
     * @Route("/{chiffreaffairereference}/edit", name="entreprisechiffreaffaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entreprisechiffreaffaire $entreprisechiffreaffaire): Response
    {
        $form = $this->createForm(EntreprisechiffreaffaireType::class, $entreprisechiffreaffaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entreprisechiffreaffaire_index');
        }

        return $this->render('entreprisechiffreaffaire/edit.html.twig', [
            'entreprisechiffreaffaire' => $entreprisechiffreaffaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{chiffreaffairereference}", name="entreprisechiffreaffaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Entreprisechiffreaffaire $entreprisechiffreaffaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entreprisechiffreaffaire->getChiffreaffairereference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entreprisechiffreaffaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entreprisechiffreaffaire_index');
    }
}
