<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $sql1 = "SELECT count(*) as entreprise  FROM entreprise";
        $stmt1 = $em->getConnection()->prepare($sql1);
        $stmt1->execute();
        $entreprise = $stmt1->fetchAll();
        $entreprisenbr = $entreprise[0]['entreprise'];

        $sql2 = "SELECT count(*) as entreprisenombreemploye  FROM entreprisenombreemploye";
        $stmt2 = $em->getConnection()->prepare($sql2);
        $stmt2->execute();
        $entreprisenombreemploye = $stmt2->fetchAll();
        $employenbr = $entreprisenombreemploye[0]['entreprisenombreemploye'];

        $sql3 = "SELECT count(*) as participant  FROM participant";
        $stmt3 = $em->getConnection()->prepare($sql3);
        $stmt3->execute();
        $participant = $stmt3->fetchAll();
        $participantnbr = $participant[0]['participant'];


        $sql4 = "SELECT count(*) as  salonedition  FROM  salonedition";
        $stmt4 = $em->getConnection()->prepare($sql4);
        $stmt4->execute();
        $salonedition = $stmt4->fetchAll();
        $saloneditionbr = $salonedition[0]['salonedition'];
       
        $sql5 = "SELECT count(*) as  salon  FROM  salon";
        $stmt5 = $em->getConnection()->prepare($sql5);
        $stmt5->execute();
        $salon = $stmt5->fetchAll();
        $salonnbr = $salon[0]['salon'];
        
        return $this->render('admin/index.html.twig', [
            'entreprisenbr' => $entreprisenbr,
            'employenbr' => $employenbr,
            'participantnbr' => $participantnbr,
            'saloneditionbr' => $saloneditionbr,
            'salonnbr' => $salonnbr,

            ]);
    }
    /**
     * @Route("/calender", name="calender")
     * IsGranted("ROLE_ADMIN")
     */
    public function calendrier(): Response
    {
        return $this->render('calendrier.html.twig');
    }



    /**
    * @Route("/choix", name="choixderencontres")
    * IsGranted("ROLE_ADMIN")
    */
    public function choix(): Response
    {
        return $this->render('choixrencontres.html.twig');
    }
}
