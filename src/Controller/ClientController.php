<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientController extends AbstractController
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    /**
     * @Route("/client", name="client_tdb")
     */
    public function clientIndex()
    {
        return $this->render('client/client.html.twig', [
            'controller_name' => 'Tableau de bord client',
        ]);
    }

    /**
     * @Route("/client/login", name="client_login")
     */
    public function clientLogin(AuthenticationUtils $auth)
    {
        return $this->render('client/login.html.twig', [
            'controller_name' => 'Connexion a l\'espace Client',
            'error' => $error = $auth->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/client/logout", name="client_logout")
     */
    public function clientLogout()
    {
    }

    /**
     * @Route("/client/register", name="client_register")
     */
    public function clientRegister(Request $request, EntityManagerInterface $manager)
    {
        $client = new Client();
        $form = $this->createForm(RegisterType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $encoded = $this->encoder->encodePassword($client, $client->getPassword());
            $client->setPassword($encoded);
            $manager->persist($client);
            $manager->flush();
            return $this->redirectToRoute('client_login');
        }

        return $this->render('client/register.html.twig', [
            'controller_name' => 'Inscrivez-vous !',
            'form_register' => $form->createView()
        ]);
    }

    /**
     * @Route("/client/donnees", name="donnees_client")
     */
    public function donneesClient()
    {
        return $this->render('client/donnees.html.twig', [
            'controller_name' => 'Modifier les infos personnelles',
        ]);
    }
}
