<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
    public function adminLogin(AuthenticationUtils $auth)
    {
        return $this->render('admin/login.html.twig', [
            'controller_name' => 'Connexion a l\'espace administrateur',
            'error' => $error = $auth->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function adminLogout()
    {
    }

    /**
     * @Route("/admin/new", name="new_article")
     */
    public function newArticle(Request $request, EntityManagerInterface $manager)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('admin_tdb');
        }

        return $this->render('admin/new.html.twig', [
            'controller_name' => 'Ajouter un article à la boutique',
            'form_new_article' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/{id}/delete", name="delete_article")
     */
    public function deleteArticle(Article $article, EntityManagerInterface $manager)
    {
        $manager->remove($article);
        $manager->flush();
        return $this->redirectToRoute('admin_tdb');
    }

    
    /**
     * @Route("/admin/{id}/edit", name="edit_article")
     */
    public function editArticle(Article $article, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('admin_tdb');
        }

        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'Modifier les informations d\'un article',
            'form_edit_article' => $form->createView()
        ]);
    }
}
