<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    public function index(CartService $cartService): Response
    {
        $cart = $session->get('cart', []);
        $cartWithData = [];
        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'product' => $productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
            'items' => $cartWithData
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route ("/cart/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session) {

        $cart = $session->get('cart', []);

        if(!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
    public function add($id, CartService $cartService): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $cartService->add($id);
        return $this->redirectToRoute("cart");
    }

        $session->set('cart', $cart);
        dd($session->get('cart'));
    /**
     * @Route ("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $cartService->remove($id);
        return $this->redirectToRoute("cart");
    }
}
