<?php

namespace App\Controller;

use App\Entity\DeliveryForm;
use App\Form\DeliveryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
      * @IsGranted("ROLE_COMMERCIAL")
 * @Route("/delivery")
 */
class DeliveryController extends AbstractController
{
    /**
     * @Route("/", name="delivery_index", methods={"GET"})
     */
    public function index(): Response
    {
        $deliveryForms = $this->getDoctrine()
            ->getRepository(DeliveryForm::class)
            ->findAll();

        return $this->render('delivery/index.html.twig', [
            'delivery_forms' => $deliveryForms,
        ]);
    }

    /**
     * @Route("/new", name="delivery_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $deliveryForm = new DeliveryForm();
        $form = $this->createForm(DeliveryFormType::class, $deliveryForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($deliveryForm);
            $entityManager->flush();

            return $this->redirectToRoute('delivery_index');
        }

        return $this->render('delivery/new.html.twig', [
            'delivery_form' => $deliveryForm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{deliveryId}", name="delivery_show", methods={"GET"})
     */
    public function show(DeliveryForm $deliveryForm): Response
    {
        return $this->render('delivery/show.html.twig', [
            'delivery_form' => $deliveryForm,
        ]);
    }

    /**
     * @Route("/{deliveryId}/edit", name="delivery_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DeliveryForm $deliveryForm): Response
    {
        $form = $this->createForm(DeliveryFormType::class, $deliveryForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('delivery_index');
        }

        return $this->render('delivery/edit.html.twig', [
            'delivery_form' => $deliveryForm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{deliveryId}", name="delivery_delete", methods={"POST"})
     */
    public function delete(Request $request, DeliveryForm $deliveryForm): Response
    {
        if ($this->isCsrfTokenValid('delete'.$deliveryForm->getDeliveryId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($deliveryForm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('delivery_index');
    }
}
