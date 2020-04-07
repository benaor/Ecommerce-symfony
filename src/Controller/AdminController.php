<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_tdb")
     */
    public function tableauDeBord(ArticleRepository $articleRepo)
    {
        return $this->render('admin/tdb.html.twig', [
            'controller_name' => 'Tableau de bord Administrateur',
            'articles' => $articles = $articleRepo->findAll()
        ]);
    }

    /**
     * @Route("/admin/login", name="admin_login")
     */
    public function adminLogin()
    {
        return $this->render('admin/login.html.twig', [
            'controller_name' => 'Connexion a l\'espace administrateur',
        ]);
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function adminLogout()
    {
    }


}
