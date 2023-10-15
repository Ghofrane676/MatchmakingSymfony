<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
    /**
    * @Route("/about.html", name="about")
    */
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }
    /**
     * @Route("/contact.html", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }
     
    /**
     * @Route("/true", name="home")
     */
    /*   public function index (SaloneditionRepository $SaloneditionRepository): Response
      {
          return $this->render('index.html.twig' , [
              'salonedition' =>$SaloneditionRepository->Lastree(),
          ]);
      }*/

        
    /**
     * @Route("/user/allcollaborateur", name="user_collaborateur", methods={"GET"})
     */
    public function findallcollaborateur(UsersRepository $usersRepository): Response
    {
        $all = $usersRepository->findAll();
        // dump($all);
        // die;
        $users =  [];
        foreach ($all as $uss) {
            if ($uss->getRoles()[0] == "ROLE_COLLABORATEUR") {
                array_push($users, $uss);
            }
        }
        return $this->render('gestionuser/allcollaborateur.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/user/alladminentreprise", name="user_adminentreprise", methods={"GET"})
     */
    public function findalladminentreprise(UsersRepository $usersRepository): Response
    {
        $all = $usersRepository->findAll();
        $users =  [];
        foreach ($all as $uss) {
            if ($uss->getRoles()[0] == "ROLE_ADMINE") {
                array_push($users, $uss);
            }
        }
        return $this->render('gestionuser/alladminentreprise.html.twig', [
            'users' => $users
        ]);
    }
}
