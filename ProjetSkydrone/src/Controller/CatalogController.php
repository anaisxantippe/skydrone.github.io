<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    // READ

    /**
     * @Route("/catalog", name="catalog")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()
                         ->getRepository(Product::class)
                         ->findAll();
        return $this->render('catalog/index.html.twig', [
            'controller_name' => 'CatalogController',
            'products' => $products
        ]);
    }

    /**
     * @Route("/details/{id}", name="product_details")
     */
    public function details(Product $product): Response {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($product);
        return $this->render('catalog/details.html.twig', [
            'product' => $product
        ]);
    }

    // UPDATE and CREATE

    /**
     * @Route("/catalog/new",name="product_new")
     * @Route("/details/{id}/edit", name="product_edit")
     */
    public function form(Product $product = null, Request $request, EntityManagerInterface $manager): Response {

        if(!$product) {
            $product = new Product();
        }

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();
            return $this->redirectToRoute('product_details', ['id' => $product->getProductId()]);
        }

        return $this->render('catalog/new.html.twig', [
            'formProduct' => $form->createView(),
            'editMode' => $product->getProductId() !== null
        ]);
    }

    //DELETE

    /**
     * @Route("/details/delete/{id}", name="product_delete")
     */
    public function delete(Product $product, Request $request, EntityManagerInterface $manager, $id): Response
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($product);
        $manager->flush();

        $response = new Response();
        $response->send();

        return $this->redirectToRoute('catalog');
    }
}
