<?php

namespace App\Controller;

use App\Form\InvitType;
use App\Entity\Users;
use phpDocumentor\Reflection\Types\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class InvitController extends AbstractController
{
    /**
     * @Route("/invit", name="invit")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(InvitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $invit = $form->getData();
            $invit = $request->get('invit');
            
            // dd($invit['email']);
            $message = (new TemplatedEmail())
                ->from('admin@gmail.com')
                ->to($invit['email'])
                ->subject('invitation par mail')
                ->htmlTemplate('emails/invit.html.twig')
                ->context([
                    'nom' => $invit['nom'],
                    'eemail' => $invit['email'],
                    'message' => $invit['message'],
                ]);
            // dd($message);
            $mailer->send($message);
            $this->addFlash('message', 'Le message a bien été envoyé');
            return $this->redirectToRoute('admin');
        }

        return $this->render('invit/index.html.twig', [
            'invitForm' => $form->createView(),
        ]);
    }
}
