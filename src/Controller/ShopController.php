<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController
{
    /**
     * @Route("/shop", name="shop")
     */
    public function shop(ArticleRepository $articleRepo)
    {
        $articles = $articleRepo->findAll();
        return $this->render('shop/shop.html.twig', [
            'controller_name' => 'Boutique',
            'articles' => $articles,
        ]);
    }

    
    /**
     * @Route("/shop/{id}/fiche_produit", name="fiche_produit")
     */
    public function fiche_produit(Article $article)
    {
        return $this->render('shop/fiche_produit.html.twig', [
            'controller_name' => 'Fiche Produit',
            'article' => $article
        ]);
    }
}
