<?php

namespace App\Controller;

use App\Entity\Entrepriseservice;
use App\Form\EntrepriseserviceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entrepriseservice")
 */
class EntrepriseserviceController extends AbstractController
{
    /**
     * @Route("/", name="entrepriseservice_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entrepriseservices = $this->getDoctrine()
            ->getRepository(Entrepriseservice::class)
            ->findAll();

        return $this->render('entrepriseservice/index.html.twig', [
            'entrepriseservices' => $entrepriseservices,
        ]);
    }

    /**
     * @Route("/new", name="entrepriseservice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entrepriseservice = new Entrepriseservice();
        $form = $this->createForm(EntrepriseserviceType::class, $entrepriseservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entrepriseservice);
            $entityManager->flush();

            return $this->redirectToRoute('entrepriseservice_index');
        }

        return $this->render('entrepriseservice/new.html.twig', [
            'entrepriseservice' => $entrepriseservice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{reference}", name="entrepriseservice_show", methods={"GET"})
     */
    public function show(Entrepriseservice $entrepriseservice): Response
    {
        return $this->render('entrepriseservice/show.html.twig', [
            'entrepriseservice' => $entrepriseservice,
        ]);
    }

    /**
     * @Route("/{reference}/edit", name="entrepriseservice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entrepriseservice $entrepriseservice): Response
    {
        $form = $this->createForm(EntrepriseserviceType::class, $entrepriseservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entrepriseservice_index');
        }

        return $this->render('entrepriseservice/edit.html.twig', [
            'entrepriseservice' => $entrepriseservice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{reference}", name="entrepriseservice_delete", methods={"POST"})
     */
    public function delete(Request $request, Entrepriseservice $entrepriseservice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entrepriseservice->getReference(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entrepriseservice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entrepriseservice_index');
    }
}
