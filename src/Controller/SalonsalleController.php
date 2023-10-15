<?php

namespace App\Controller;

use App\Entity\Salonsalle;
use App\Form\SalonsalleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salonsalle")
 */
class SalonsalleController extends AbstractController
{
    /**
     * @Route("/", name="salonsalle_index", methods={"GET"})
     */
    public function index(): Response
    {
        $salonsalles = $this->getDoctrine()
            ->getRepository(Salonsalle::class)
            ->findAll();

        return $this->render('salonsalle/index.html.twig', [
            'salonsalles' => $salonsalles,
        ]);
    }

    /**
     * @Route("/new", name="salonsalle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $salonsalle = new Salonsalle();
        $form = $this->createForm(SalonsalleType::class, $salonsalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salonsalle);
            $entityManager->flush();

            return $this->redirectToRoute('salonsalle_index');
        }

        return $this->render('salonsalle/new.html.twig', [
            'salonsalle' => $salonsalle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{sallereference}", name="salonsalle_show", methods={"GET"})
     */
    public function show(Salonsalle $salonsalle): Response
    {
        return $this->render('salonsalle/show.html.twig', [
            'salonsalle' => $salonsalle,
        ]);
    }

    /**
     * @Route("/{sallereference}/edit", name="salonsalle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Salonsalle $salonsalle): Response
    {
        $form = $this->createForm(SalonsalleType::class, $salonsalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salonsalle_index');
        }

        return $this->render('salonsalle/edit.html.twig', [
            'salonsalle' => $salonsalle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{sallereference}", name="salonsalle_delete", methods={"POST"})
     */
    public function delete(Request $request, Salonsalle $salonsalle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salonsalle->getSallereference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salonsalle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('salonsalle_index');
    }
}
