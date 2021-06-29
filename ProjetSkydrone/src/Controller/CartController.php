<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Form\CustomersType;
use App\Repository\CustomersRepository;
use App\Repository\ProductRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(CartService $cartService): Response
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route ("/cart/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $cartService->add($id);
        return $this->redirectToRoute("cart");
    }

    /**
     * @Route ("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $cartService->remove($id);
        return $this->redirectToRoute("cart");
    }


    /**
     * @param CustomersRepository $customersRepository
     * @param UserInterface $user
     * @param $request
     * @return Response
     * @Route ("/cart/test", name="cart_test")
     */
    public function validate(CustomersRepository $customersRepository, UserInterface $user, Request $request, SessionInterface $session,ProductRepository $productRepository)
    {
//        dd($user->getUserId());
        if ($user->getUserId()) {
            if (!$customersRepository->findOneBy(['user' => $user->getUserId()])) {
                $customer = new Customers();
                $form = $this->createForm(CustomersType::class, $customer);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($customer);
                    $entityManager->flush();

                    return $this->redirectToRoute('customers_index');
                }

                return $this->render('customers/new.html.twig', [
                    'customer' => $customer,
                    'form' => $form->createView(),
                ]);
            } else {
                $cart = $session->get('cart');
                $panier=[];
                foreach ($cart as $produit=>$quantite){
                    $panier[]=[
                        'product'=>$productRepository->findOneBy([
                            'productId'=>$produit
                        ]),
                        'quantity'=>$quantite
                    ];

                }
                return $this->render('cart/confirmation.html.twig',[
                    'items'=>$panier
                ]);

            }
        }
    }

}
