<?php

namespace App\Controller;

use App\Entity\Suppliers;
use App\Form\SuppliersType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *@IsGranted("ROLE_FOURNISSEURS")
 * @Route("/suppliers")
 */
class SuppliersController extends AbstractController
{
    /**
     * @Route("/", name="suppliers_index", methods={"GET"})
     */
    public function index(): Response
    {
        $suppliers = $this->getDoctrine()
            ->getRepository(Suppliers::class)
            ->findAll();

        return $this->render('suppliers/index.html.twig', [
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * @Route("/new", name="suppliers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $supplier = new Suppliers();
        $form = $this->createForm(SuppliersType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($supplier);
            $entityManager->flush();

            return $this->redirectToRoute('suppliers_index');
        }

        return $this->render('suppliers/new.html.twig', [
            'supplier' => $supplier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{suppliersId}", name="suppliers_show", methods={"GET"})
     */
    public function show(Suppliers $supplier): Response
    {
        return $this->render('suppliers/show.html.twig', [
            'supplier' => $supplier,
        ]);
    }

    /**
     * @Route("/{suppliersId}/edit", name="suppliers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Suppliers $supplier): Response
    {
        $form = $this->createForm(SuppliersType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suppliers_index');
        }

        return $this->render('suppliers/edit.html.twig', [
            'supplier' => $supplier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{suppliersId}", name="suppliers_delete", methods={"POST"})
     */
    public function delete(Request $request, Suppliers $supplier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$supplier->getSuppliersId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($supplier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suppliers_index');
    }
}
