<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactController extends AbstractController
{
    /**
     * @Route("/nous-contacter", name="contact", methods={"GET","POST"})
     */
    public function new(Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();
        $contact->setDateContact(new \DateTime('now', new \DateTimeZone('Europe/Paris')));

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactData = $form->getData();
            $data = $request->request->get('contact');
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactData);
            $em->flush();

            $email = (new TemplatedEmail())
                ->from(new Address('daytorole@gmail.com', 'Site Day To Role'))  
                ->to('daytorole@gmail.com')
                ->subject('Nouveau message sur Day To Role')
                ->htmlTemplate('emails/contact-notification.html.twig')
                ->context([
                    'nom' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'addresseEmail' => $data['email'],
                    'objet' => $data['objet'],
                    'message' => $data['message'],
                ])
            ;

            $mailer->send($email);

            $this->addFlash(
                'success',
                'Merci pour ton message !'
            );

            return $this->redirectToRoute('contact');

        } else if ($form->isSubmitted() && !$form->isValid()) {
           return $this->render('contact.html.twig', [
                'form' => $form->createView(),
                "error" => true
            ]);
        }

        return $this->render('contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
?>