<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    public function addToCart($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);
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
