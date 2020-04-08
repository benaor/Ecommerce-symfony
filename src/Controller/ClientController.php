<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ClientController extends AbstractController
{
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
}