<?php

namespace App\Controller;

use App\Entity\Entreprisesecteurprincipal;
use App\Form\EntreprisesecteurprincipalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprisesecteurprincipal")
 */
class EntreprisesecteurprincipalController extends AbstractController
{
    /**
     * @Route("/", name="entreprisesecteurprincipal_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entreprisesecteurprincipals = $this->getDoctrine()
            ->getRepository(Entreprisesecteurprincipal::class)
            ->findAll();

        return $this->render('entreprisesecteurprincipal/index.html.twig', [
            'entreprisesecteurprincipals' => $entreprisesecteurprincipals,
        ]);
    }

    /**
     * @Route("/new", name="entreprisesecteurprincipal_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entreprisesecteurprincipal = new Entreprisesecteurprincipal();
        $form = $this->createForm(EntreprisesecteurprincipalType::class, $entreprisesecteurprincipal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprisesecteurprincipal);
            $entityManager->flush();

            return $this->redirectToRoute('entreprisesecteurprincipal_index');
        }

        return $this->render('entreprisesecteurprincipal/new.html.twig', [
            'entreprisesecteurprincipal' => $entreprisesecteurprincipal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{secteurpincipalreference}", name="entreprisesecteurprincipal_show", methods={"GET"})
     */
    public function show(Entreprisesecteurprincipal $entreprisesecteurprincipal): Response
    {
        return $this->render('entreprisesecteurprincipal/show.html.twig', [
            'entreprisesecteurprincipal' => $entreprisesecteurprincipal,
        ]);
    }

    /**
     * @Route("/{secteurpincipalreference}/edit", name="entreprisesecteurprincipal_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entreprisesecteurprincipal $entreprisesecteurprincipal): Response
    {
        $form = $this->createForm(EntreprisesecteurprincipalType::class, $entreprisesecteurprincipal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entreprisesecteurprincipal_index');
        }

        return $this->render('entreprisesecteurprincipal/edit.html.twig', [
            'entreprisesecteurprincipal' => $entreprisesecteurprincipal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{secteurpincipalreference}", name="entreprisesecteurprincipal_delete", methods={"POST"})
     */
    public function delete(Request $request, Entreprisesecteurprincipal $entreprisesecteurprincipal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entreprisesecteurprincipal->getSecteurpincipalreference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entreprisesecteurprincipal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entreprisesecteurprincipal_index');
    }
}
