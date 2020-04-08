<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function clientIndex()
    {
        return $this->render('client/client.html.twig', [
            'controller_name' => 'Tableau de bord client',
        ]);
    }
}