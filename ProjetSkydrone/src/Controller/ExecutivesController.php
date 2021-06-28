<?php

namespace App\Controller;

use App\Entity\Executives;
use App\Form\ExecutivesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/executives")
 */
class ExecutivesController extends AbstractController
{
    /**
     * @Route("/", name="executives_index", methods={"GET"})
     */
    public function index(): Response
    {
        $executives = $this->getDoctrine()
            ->getRepository(Executives::class)
            ->findAll();

        return $this->render('executives/index.html.twig', [
            'executives' => $executives,
        ]);
    }

    /**
     * @Route("/new", name="executives_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $executive = new Executives();
        $form = $this->createForm(ExecutivesType::class, $executive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($executive);
            $entityManager->flush();

            return $this->redirectToRoute('executives_index');
        }

        return $this->render('executives/new.html.twig', [
            'executive' => $executive,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{executivesId}", name="executives_show", methods={"GET"})
     */
    public function show(Executives $executive): Response
    {
        return $this->render('executives/show.html.twig', [
            'executive' => $executive,
        ]);
    }

    /**
     * @Route("/{executivesId}/edit", name="executives_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Executives $executive): Response
    {
        $form = $this->createForm(ExecutivesType::class, $executive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('executives_index');
        }

        return $this->render('executives/edit.html.twig', [
            'executive' => $executive,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{executivesId}", name="executives_delete", methods={"POST"})
     */
    public function delete(Request $request, Executives $executive): Response
    {
        if ($this->isCsrfTokenValid('delete'.$executive->getExecutivesId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($executive);
            $entityManager->flush();
        }

        return $this->redirectToRoute('executives_index');
    }
}
