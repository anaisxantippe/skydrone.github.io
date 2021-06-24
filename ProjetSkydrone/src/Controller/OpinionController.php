<?php

namespace App\Controller;

use App\Entity\Opinion;
use App\Form\OpinionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/opinion")
 *
 */
class OpinionController extends AbstractController
{
    /**
     * @Route("/", name="opinion_index", methods={"GET"})
     */
    public function index(): Response
    {
        $opinions = $this->getDoctrine()
            ->getRepository(Opinion::class)
            ->findAll();

        return $this->render('opinion/index.html.twig', [
            'opinions' => $opinions,
        ]);
    }

    /**
     * @Route("/new", name="opinion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $opinion = new Opinion();
        $form = $this->createForm(OpinionType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($opinion);
            $entityManager->flush();

            return $this->redirectToRoute('opinion_index');
        }

        return $this->render('opinion/new.html.twig', [
            'opinion' => $opinion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{opinionId}", name="opinion_show", methods={"GET"})
     */
    public function show(Opinion $opinion): Response
    {
        return $this->render('opinion/show.html.twig', [
            'opinion' => $opinion,
        ]);
    }

    /**
     * @Route("/{opinionId}/edit", name="opinion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Opinion $opinion): Response
    {
        $form = $this->createForm(OpinionType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('opinion_index');
        }

        return $this->render('opinion/edit.html.twig', [
            'opinion' => $opinion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{opinionId}", name="opinion_delete", methods={"POST"})
     */
    public function delete(Request $request, Opinion $opinion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opinion->getOpinionId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($opinion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('opinion_index');
    }

 //   public function getProduct() {
  //      $product = $this->loadModel('Product');
    //    $productList = $product->getAll();
      //  $this->render('_form', [
        //    'productList' => $productList
       // ]);
    //}
}
