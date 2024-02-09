<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $formContact = $this->createForm(ContactType::class);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) :
            $contactData = $formContact->getData();

            $email = (new Email())
                ->from($contactData['email'])
                ->to('m.bigot115@gmail.com')
                ->subject($contactData['sujet'])
                ->text($contactData['message'])
                ->text('<p>' . $contactData['message'] . '</p>');

                $mailer->send($email);

                $this->addFlash(
                    'emailContact',
                    'Votre message est bien envoyé!'
                );

                return $this->redirectToRoute('app_homepage');
        endif;


        return $this->render('contact/index.html.twig', [
            'formContact' => $formContact,
        ]);
    }
}
