<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}
