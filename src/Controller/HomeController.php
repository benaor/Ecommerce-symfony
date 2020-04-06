<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Page d\'acceuil',
        ]);
    }

    /**
     * @Route("/home/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'Page de contact',
        ]);
    }

    /**
     * @Route("/home/presentation", name="presentation")
     */
    public function presentation()
    {
        return $this->render('home/presentation.html.twig', [
            'controller_name' => 'Qui sommes-nous ?',
        ]);
    }
}
