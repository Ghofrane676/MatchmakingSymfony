<?php

namespace App\Controller;

use App\Entity\Entreprisesoussecteur;
use App\Form\EntreprisesoussecteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprisesoussecteur")
 */
class EntreprisesoussecteurController extends AbstractController
{
    /**
     * @Route("/", name="entreprisesoussecteur_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entreprisesoussecteurs = $this->getDoctrine()
            ->getRepository(Entreprisesoussecteur::class)
            ->findAll();

        return $this->render('entreprisesoussecteur/index.html.twig', [
            'entreprisesoussecteurs' => $entreprisesoussecteurs,
        ]);
    }

    /**
     * @Route("/new", name="entreprisesoussecteur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entreprisesoussecteur = new Entreprisesoussecteur();
        $form = $this->createForm(EntreprisesoussecteurType::class, $entreprisesoussecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprisesoussecteur);
            $entityManager->flush();

            return $this->redirectToRoute('entreprisesoussecteur_index');
        }

        return $this->render('entreprisesoussecteur/new.html.twig', [
            'entreprisesoussecteur' => $entreprisesoussecteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{sssecteurreference}", name="entreprisesoussecteur_show", methods={"GET"})
     */
    public function show(Entreprisesoussecteur $entreprisesoussecteur): Response
    {
        return $this->render('entreprisesoussecteur/show.html.twig', [
            'entreprisesoussecteur' => $entreprisesoussecteur,
        ]);
    }

    /**
     * @Route("/{sssecteurreference}/edit", name="entreprisesoussecteur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entreprisesoussecteur $entreprisesoussecteur): Response
    {
        $form = $this->createForm(EntreprisesoussecteurType::class, $entreprisesoussecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entreprisesoussecteur_index');
        }

        return $this->render('entreprisesoussecteur/edit.html.twig', [
            'entreprisesoussecteur' => $entreprisesoussecteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{sssecteurreference}", name="entreprisesoussecteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Entreprisesoussecteur $entreprisesoussecteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entreprisesoussecteur->getSssecteurreference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entreprisesoussecteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entreprisesoussecteur_index');
    }
}
