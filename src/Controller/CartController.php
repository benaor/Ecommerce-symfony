<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function cart(SessionInterface $session, ArticleRepository $articleRepo)
    {
        $panier = $session->get('panier', []);
    
        $panierWithData = [];

        foreach($panier as $id => $quantity){
            $panierWithData[] = [
                'article'=> $articleRepo->find($id),
                'quantity'=> $quantity
            ];
        }

        $total = 0;
        foreach ($panierWithData as $article) {
            $totalArticle = $article['article']->getPrice()*$article['quantity'];
            $total += $totalArticle;
        }

        return $this->render('cart/cart.html.twig', [
            'controller_name' => 'Votre Panier',
            'articlesInCart' => $panierWithData,
            'total'=> $total
        ]);

    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function addToCart($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function removeToCart($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (($panier[$id]) > 1) {
            $panier[$id]--;
        } else {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute('cart');
    }


    /**
     * @Route("/cart/delete/{id}", name="cart_delete")
     */
    public function deleteCart($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])){
            unset($panier[$id]);
        } 

        $session->set('panier', $panier);
        return $this->redirectToRoute('cart');
    }
}
