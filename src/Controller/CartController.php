<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function cart()
    {
        return $this->render('cart/cart.html.twig', [
            'controller_name' => 'Votre Panier',
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function addToCart($id, Request $request)
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id] = 1;
        } else {
            $panier[$id]++;
        }
        
        $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function removeToCart()
    {
    }

    /**
     * @Route("/cart/delete/{id}", name="cart_delete")
     */
    public function deleteCart()
    {
    }
}
