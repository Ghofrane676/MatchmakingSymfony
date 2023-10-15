<?php

namespace App\Controller;

use App\Entity\Salon;
use App\Form\SalonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salon")
 */
class SalonController extends AbstractController
{
    /**
     * @Route("/", name="salon_index", methods={"GET"})
     */
    public function index(): Response
    {
        $salons = $this->getDoctrine()
            ->getRepository(Salon::class)
            ->findAll();

        return $this->render('salon/index.html.twig', [
            'salons' => $salons,
        ]);
    }

    /**
     * @Route("/new", name="salon_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $salon = new Salon();
        $form = $this->createForm(SalonType::class, $salon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salon);
            $entityManager->flush();

            return $this->redirectToRoute('salon_index');
        }

        return $this->render('salon/new.html.twig', [
            'salon' => $salon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{salonreference}", name="salon_show", methods={"GET"})
     */
    public function show(Salon $salon): Response
    {
        return $this->render('salon/show.html.twig', [
            'salon' => $salon,
        ]);
    }

    /**
     * @Route("/{salonreference}/edit", name="salon_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Salon $salon): Response
    {
        $form = $this->createForm(SalonType::class, $salon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salon_index');
        }

        return $this->render('salon/edit.html.twig', [
            'salon' => $salon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{salonreference}", name="salon_delete", methods={"POST"})
     */
    public function delete(Request $request, Salon $salon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salon->getSalonreference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('salon_index');
    }
}
