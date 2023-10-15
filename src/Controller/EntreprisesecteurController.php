<?php

namespace App\Controller;

use App\Entity\Entreprisesecteur;
use App\Form\EntreprisesecteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprisesecteur")
 */
class EntreprisesecteurController extends AbstractController
{
    /**
     * @Route("/", name="entreprisesecteur_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entreprisesecteurs = $this->getDoctrine()
            ->getRepository(Entreprisesecteur::class)
            ->findAll();

        return $this->render('entreprisesecteur/index.html.twig', [
            'entreprisesecteurs' => $entreprisesecteurs,
        ]);
    }

    /**
     * @Route("/new", name="entreprisesecteur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entreprisesecteur = new Entreprisesecteur();
        $form = $this->createForm(EntreprisesecteurType::class, $entreprisesecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprisesecteur);
            $entityManager->flush();

            return $this->redirectToRoute('entreprisesecteur_index');
        }

        return $this->render('entreprisesecteur/new.html.twig', [
            'entreprisesecteur' => $entreprisesecteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{secteurreference}", name="entreprisesecteur_show", methods={"GET"})
     */
    public function show(Entreprisesecteur $entreprisesecteur): Response
    {
        return $this->render('entreprisesecteur/show.html.twig', [
            'entreprisesecteur' => $entreprisesecteur,
        ]);
    }

    /**
     * @Route("/{secteurreference}/edit", name="entreprisesecteur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entreprisesecteur $entreprisesecteur): Response
    {
        $form = $this->createForm(EntreprisesecteurType::class, $entreprisesecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entreprisesecteur_index');
        }

        return $this->render('entreprisesecteur/edit.html.twig', [
            'entreprisesecteur' => $entreprisesecteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{secteurreference}", name="entreprisesecteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Entreprisesecteur $entreprisesecteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entreprisesecteur->getSecteurreference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entreprisesecteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entreprisesecteur_index');
    }
}
